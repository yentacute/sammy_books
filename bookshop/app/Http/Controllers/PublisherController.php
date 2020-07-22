<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publisher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class PublisherController extends Controller
{
    public function index(){
        $publisher = Publisher::paginate(15);
        return view('admin.publisher.list',compact('publisher'));
    }
     public function create(){
        return view('admin.publisher.add');
    }
    public function store(Request $request){
        if($request->isMethod('post')){
            $validator= Validator::make($request->all(),[
                'publisher_name'=>'required|min:5|max:50',
            ]);
            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }
        }
        $check = DB::table('publisher')
                    ->where('publisher_name',$request->publisher_name)
                    ->first();
        if(!$check){
        $newCate = new Publisher();
        $newCate->publisher_name = $request->publisher_name;
        $newCate->save();
        return redirect()->route('publisher.list');
        }else{
            return back()->with('message','Nhà xuất bản đã tồn tại, mời thêm nhà xuất bản khác');
        }
    }
    public function destroy($id){
        $delete = Publisher::find($id)
        ->delete();
        return redirect()->back();
    }
}
