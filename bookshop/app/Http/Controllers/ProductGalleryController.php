<?php

namespace App\Http\Controllers;

use App\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class ProductGalleryController extends Controller
{
    public function index(){
        // $gallery = DB::table('image')
        //         ->join('books','books.id', '=' , 'image.books_id')
        //         ->select('image.*','books.*')
        //         ->get();
        return view('admin.productgallery.list',compact('gallery'));
    }
     public function create()
    {
        $product = DB::table('books')->get();
       return view('admin.productgallery.add',compact('product'));
    }
    public function store(Request $request){
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(),[
                'name'=>'required',
                'imager'=>'required|image|mimes:jpg,png,gif,jpeg|max:10000',
                'books_id'=>'required'

            ]);
        }
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }
        if ($request->hasFile('imager')) {
            $file = $request->file('imager');
            //đường dẫn
            $destination = public_path('storage/image/gallery');
            //tềên file
            $filename = 'storage/image/gallery/'.time().'_'.$file->getClientOriginalExtension();
            //upload
            $file->move($destination,$filename);
        }
        else{
             $filename ='noimage.jpg';
        }
        $image = DB::table('image')->where('name',$request->name)->first();
        if (!$image) {
            $newImage = new ProductGallery();
            $newImage->name =$request->name;
            $newImage->imager = $filename;
            $newImage->books_id =$request->books_id;
            $newImage->save();
            return redirect()->route('gallery.list');

        }else{
            return redirect()->back()->with('message','Bạn đã up ảnh này rồi!');
        }
    }
    public function destroy($id){
        $img = ProductGallery::find($id)
                ->delete();
        return redirect()->back();

    }
}
