<?php

namespace App\Http\Controllers;

use App\NewProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PostProductController extends Controller

{
    public function index(){
        $ListPro = NewProduct::paginate(10);
        return view('admin.ListProduct',compact('ListPro'));
    }
    public function create(){
        $categories = DB::table('category')->get();
        $publishers = DB::table('publisher')->get();
        return view('admin.AddProduct',compact('categories','publishers'));
    }
    public function store(Request $request){
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'title'=>'required|min:10|max:65',
                'price'=>'required|numeric|min:10000|max:1000000000',
                'sale_price'=>'required|numeric|min:10000|max:1000000000',
                'cate_id'=>'required',
                'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:20480',
                'description'=>'required|min:30|max:100000',
                'genre'=>'required',
                'author'=>'required',
                'publisher_id'=>'required',
                'status'=>'required'
        ]
        );
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = public_path('storage/image/books');
            $filename = 'storage/image/books/'. time().'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath, $filename);

        }else{
            $filename ='noimage.jpg';
        }

        // die($file_url);



        $news = new NewProduct();
        $news->title = $request->title;
        $news->price = $request->price;
        $news->sale_price = $request->sale_price;
        $news->cate_id = $request->cate_id;
        $news->image = $filename ;
        $news->description = $request->description;
        $news->genre = $request->genre;
        $news->author = $request->author;
        $news->publisher_id = $request->publisher_id;
        $news->status = $request->status;
        $news->save();
        return redirect()->route('admin.ListProduct');



        }
    }
    public function destroy($id){
        $res= NewProduct::find($id);
        $res->delete();
        return redirect()->back();
    }
    public function edit($id){
        $res= NewProduct::find($id);
        $categories = DB::table('category')->get();
        $publishers = DB::table('publisher')->get();
        return view('admin.edit',compact('res','id','categories','publishers'));

    }
    public function update ( Request $request){
        $news= NewProduct::find($request->id);
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'title'=>'required|min:10|max:65',
                'price'=>'required|numeric|min:10000|max:1000000000',
                'sale_price'=>'required|numeric|min:10000|max:1000000000',
                'cate_id'=>'required',
                'image'=>'image|mimes:jpeg,png,jpg,gif|max:20480',
                'description'=>'required|min:30|max:10000',
                'genre'=>'required',
                'author'=>'required',
                'publisher_id'=>'required',
                'status'=>'required'
        ]
        );
        if ($validator->fails()) {
             return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = public_path('storage/image/books');
            $filename = 'storage/image/books/'. time().'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath, $filename);
             $news->image = $filename;

        }else{
            $file_url ='noimage.jpg';
        }

        // die($file_url);

        $news->title = $request->title;
        $news->price = $request->price;
        $news->sale_price = $request->sale_price;
        $news->cate_id = $request->cate_id;
        $news->description = $request->description;
        $news->genre = $request->genre;
        $news->author = $request->author;
        $news->publisher_id = $request->publisher_id;
        $news->status = $request->status;
        $news->save();
        return redirect()->route('admin.ListProduct');



        }
    }
}
