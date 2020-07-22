<?php

namespace App\Http\Controllers;

use App\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SlideController extends Controller
{
    public function index(){
        $ListSlide = Slide::all();
        return view('admin.slide.list',compact('ListSlide'));
    }
    public function create(){
        $books = DB::table('books')->get();
        return view('admin.slide.add',compact('books'));

    }
    public function store(Request $request){
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'name'=>'required|min:5|max:20',
                'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:20480',
                'id_book'=>'required',
                'status'=>'required',

            ]);

        }
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = public_path('storage/slide');
            $filename = 'storage/slide/'. time().'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath, $filename);

          }else{
            $filename ='noimage.jpg';
          }

          $newslide = new Slide();
          $newslide->name =$request->name;
          $newslide->image = $filename;
          $newslide->id_book =$request->id_book;
          $newslide->status =$request->status;
          $newslide->save();
          return redirect()->route('slide.list');



    }
    public function edit($id){
        $slide = Slide::find($id);
        $book = DB::table('books')->get();
        return view('admin.slide.edit',compact('slide','book'));
    }
    public function update(Request $request){
        $slideUp = Slide::find($request->id);
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'name'=>'required|min:5|max:20',
                'image'=>'image|mimes:jpeg,png,jpg,gif|max:20480',
                'id_book'=>'required',
                'status'=>'required',

            ]);

        }
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = public_path('storage/slide');
            $filename = 'storage/slide/'. time().'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath, $filename);
            $slideUp->image =   $filename;

          }else{
            $filename='noimage.jpg';
          }

          $slideUp->name =$request->name;
          $slideUp->id_book =$request->id_book;
          $slideUp->status =$request->status;
          $slideUp->save();

        return redirect()->route('slide.list');
    }
    public function destroy($id){
        $delete = Slide::find($id)
        ->delete();
        return redirect()->route('slide.list');
    }
}
