<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\NewProduct;
use App\Category;
use App\Publisher;
use App\Cart;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    //
    public function index(){
        $ListPro = DB::table('books')->where('status',1)
                                     ->orderBy('id','asc')
                                    ->limit(6)
                                    ->get() ;

        $cate =  DB::table('category')->where('status',1)
                                     ->limit(6)
                                    ->get();
        $publisher =  DB::table('publisher')->get();
        $slide = DB::table('slide')
        ->join('books','slide.id_book', '=' , 'books.id')
        ->select('slide.*','books.id','books.title')
        ->get();
        $randomProduct = NewProduct::inRandomOrder()->limit(6)->get();
        // $search = NewProduct::search('')

        return view('frontend.home',compact('ListPro','cate','publisher','slide','randomProduct'));
    }
    public function cate($id){
        $Cate = DB::table('category')->where('status',1)
                                    ->get();
        $pro = DB::table('books')->where('cate_id',$id)
                                ->get();
        return view('frontend.category',compact('Cate','pro'));
    }
    public function publisher($id){
        $publisher = DB::table('publisher')->get();
        $product = DB::table('books')->where('publisher_id',$id)
                                ->get();
        return view('frontend.publisher',compact('publisher','product'));
    }
    public function detail($id ){
        $product = DB::table('books')->where('id',$id)
                                    ->get();
        $cate = Category::all();
        $publisher = Publisher::all();
        $categories = Category::with('books')->distinct()->get();
        $publi =Publisher::find($id);
        return view('frontend.product_detail',compact('product','cate','publisher','publi','relate'));
    }
    public function Product(){
        $cate = Category::where('status',1)->get();
        $publisher = Publisher::all();
        $product = NewProduct::where('status',1)->paginate(10);
        $publisher = Publisher::all();
        return view('frontend.product',compact('cate','publisher','product'));
    }
    public function Search(Request $request){
        $search = $request->get('search');
        $posts=NewProduct::where('title','like','%'.$request->search.'%')->get();
        return view('frontend.search',compact('posts'));
    }

    public function getAddToCart(Request $request, $id){
        $product = NewProduct::find($id);
        if(!$product){
            abort(404);
        }
        $cart = session()->get('cart');
        if(!$cart){
            $cart = [
                $id => [
                    "id"=>$product->id,
                    "title"=>$product->title,
                    "price"=>$product->price,
                    "quantity" => 1,
                    "image" => $product->image
                ]
                ];
                session()->put('cart',$cart);
                return redirect()->back()->with('message','thêm sản phẩm thành công');
        }
        
        
        //nếu mà cart không rỗng
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
            session()->put('cart',$cart);
            return redirect()->back()->with('message','thêm sản phẩm thành công');
        }
        //nếu cart rỗng thì cho số lượng bằng 1
        $cart[$id] = [
                "id"=>$product->id,
                "title"=>$product->title,
                "price"=>$product->price,
                "quantity" => 1,
                "image" => $product->image
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('message','thêm sản phẩm thành công');
            
    }
    public function showCart(){
        if (!Session::has('cart') || empty(Session::get('cart'))) {
            return redirect()->route('books.product')->with('message','Chưa có sản phẩm nào trong giỏ hàng mời chọn');
        }
        $cart = Session::get('cart');
        $mang_id = array_keys($cart);
        $listSP = DB::table('books')->whereIn('id', $mang_id)->get();
        return view('frontend.cart',compact('listSP','cart'));

        //lệnh hủy session giỏ hàng khi gửi xong đơn hàng:
        //  Session::remove('cart');

    }
    public function updateCart(Request $request){
        if($request->has('cart')){
        $cart = Session::get('cart');
        $quanty =$request->quantity_;
        if($request->isMethod('post')){
            foreach($cart as $item=>$pro){
                 $cart[$pro]['quatity']= $quanty;
            }
            Session::put('cart',$cart);
            return redirect()->back();
        }
    }
        // $mang_id = array_keys($cart);
        // dd($mang_id);
        // if($request->isMethod('post')){
        //     foreach($request->all() as $item =>$val){
        //         echo "<br> $item =>$val";
        //         print_r($item->$val);die;
        //         if(strpos($item,'quantity_')!==false){
        //             $id = str_replace('quantity_','',$id); // tách lấy id trong chuỗi

        //             if(intval($val) <1){
        //                 // số lượng nhỏ hơn 1 ==> xóa sản phẩm khỏi giỏ hàng
        //                 unset($cart[$id]);
        //             }else
        //                 $cart[$id] = $val; // gán số lượng mới

        //         }
        //     }
        //     // cập nhật lại session giỏ hàng
        //     Session::put('cart',$cart);
            
        // }
        // return redirect()->back();
    }

    public function removeCart(Request $request){
        $cart = session()->get('cart');
         session()->forget('cart',$cart);
        session()->put('cart', $cart);
        return redirect()->back()->with('success','Xóa sản phẩm thành công');
    }
}
