<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(){
        $CateList = Category::all();
        return view('admin.cate.ListCategory',compact('CateList'));
    }
     public function create(){
        return view('admin.cate.Create');
    }
    public function store(Request $request){
        if($request->isMethod('post')){
            $validator= Validator::make($request->all(),[
                'cate_name'=>'required|min:5|max:50',
                'status'=>'required'
            ]);
            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }
        }
        // //upload
        $newCate = new Category();
        $newCate->cate_name = $request->cate_name;
        $newCate->status = $request->status;
        $newCate->save();
        return redirect()->route('category.list');
    }
    public function destroy($id){
        $deleteCate = Category::find($id)
        ->delete();
        return redirect()->back();
    }
    public function edit($id){
        $res= Category::find($id);
        return view('admin.cate.EditCate',compact('res'));

    }
    public function update( Request $request){
        $edit = Category::find($request->id);
        if($request->isMethod('post')){
            $validator= Validator::make($request->all(),[
                'cate_name'=>'required|min:5|max:50',
                'status'=>'required'
            ]);
            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }
        }
        $edit->cate_name = $request->cate_name;
        $edit->status = $request->status;
        $edit->save();
        return redirect()->route('category.list');



    }
}
