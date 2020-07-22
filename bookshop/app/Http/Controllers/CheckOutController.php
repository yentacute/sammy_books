<?php

namespace App\Http\Controllers;

use App\CheckOut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CheckOutController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart');
        $mang_id = array_keys($cart);
        $listSP = DB::table('books')->whereIn('id', $mang_id)->get();
        $order = CheckOut::orderBy('id','desc')->get();
        return view('frontend.checkout',compact('listSP','cart'));
    }
    public function store(Request $request){
        $cart = Session::get('cart');
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(),[
                'fullname'=>'required|min:5|max:50',
                'username'=>'required|min:5|max:30',
                'email'=>'required|email',
                'phone'=>'required|numeric',
                'address'=>'required|min:5|max:100',
                'zip'=>'required|numeric',
            ]);
            if($validator->fails()){
                return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
            }
        $newOrder = new CheckOut();
        $newOrder->fullname = $request->fullname;
        $newOrder->username = $request->username;
        $newOrder->email = $request->email;
        $newOrder->phone = $request->phone;
        $newOrder->address = $request->address;
        $newOrder->zip = $request->zip;
        $newOrder->cart = json_encode($cart);
        $newOrder->totalprice = $request->totalprice;
        $newOrder->save();
        $request->session()->flush();
        return redirect()->route('books.product')->with('message','Đặt hàng thành công!!');

        }
    }
    public function AdminCheckOut(){
        $order = CheckOut::all();
        return view('admin.order.list',compact('order'));
    }
    public function destroy($id){
        $deletecheck = CheckOut::find($id);
        $deletecheck->delete();
        return redirect()->back();

    }
}
