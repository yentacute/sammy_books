@extends('layouts.main')
@section('content')
<div class="container wow fadeIn">

    <!-- Heading -->
        <h2 class="my-5 h2 text-center">Checkout form</h2>

        <!--Grid row-->
        <div class="row">

        <!--Grid column-->
        <div class="col-md-8 mb-4">

            <!--Card-->
            <div class="card">

            <!--Card content-->
            <form class="card-body" method="post" action="{{route('checkout.post')}}">
                @csrf
                <div class="row">
                <div class="col-md-6 mb-2">

                    <!--firstName-->
                    <div class="md-form ">
                        <label for="fullname" class="">Họ và tên</label>
                    <input type="text" name="fullname" class="form-control">
                    @if($errors->first('fullname'))
                    <span class="text-danger">{{$errors->first('fullname')}}</span>
                    @endif
                    </div>

                </div>
            </div>
                <div class="md-form input-group pl-0 mb-5"><br>
                    <label for="username" class="">Tên tài khoản</label>
                <input type="text" class="form-control py-0" placeholder="Username" aria-describedby="basic-addon1" name="username">
                @if($errors->first('username'))
                <span class="text-danger">{{$errors->first('username')}}</span>
                @endif
                </div><br>

                <!--email-->
                <div class="md-form mb-5">
                <label for="email" class="">Email </label>
                <input type="text" name="email" class="form-control" placeholder="youremail@example.com">
                @if($errors->first('email'))
                <span class="text-danger">{{$errors->first('email')}}</span>
                @endif
                </div><br>
                <div class="md-form mb-5">
                    <label for="phone" class="">Số điện thoại </label>
                    <input type="phone" name="phone" class="form-control" placeholder="SĐT">
                    @if($errors->first('phone'))
                    <span class="text-danger">{{$errors->first('phone')}}</span>
                    @endif
                    </div><br>

                <!--address-->
                <div class="md-form mb-5">
                <label for="address" class="">Địa chỉ</label>
                <input type="text" name="address" class="form-control" placeholder="Địa chỉ">
                @if($errors->first('address'))
                <span class="text-danger">{{$errors->first('address')}}</span>
                @endif
                </div>
                <!--Grid row-->
                <div class="row">
                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4">
                    <label for="zip">Mã bưu điện</label>
                    <input type="text" class="form-control" name="zip" placeholder="zip code" >
                    @if($errors->first('zip'))
                    <span class="text-danger">{{$errors->first('zip')}}</span>
                    @endif
                </div><br>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4 mb-4">

            <!-- Heading -->
            <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">{{count($listSP)}}</span>
            </h4>

            <!-- Cart -->
            <ul class="list-group mb-3 z-depth-1">
            @php
                $totalPrice = 0;
            @endphp
                @foreach ($cart as $id=> $item)
                {{-- @php
                // $price = $item['price'] * $cart['quantity'];
                $totalPrice += $price;
                 @endphp --}}
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                <h6 class="my-0">{{$item['title']}}</h6>
                <img src="{{asset($item['image'])}}" alt="" width="50">
                {{-- <small>Số lượng:{{ $cart['quantity']}}</small> --}}
                </div>
                {{-- <span class="text-muted">{{number_format($price)}}đ</span> --}}
            </li>
               @endforeach
            </ul>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (VNĐ)</span>
                    {{-- <strong>{{number_format($totalPrice)}}</strong> --}}
                  </li>
                  {{-- <input type="hidden" name="totalprice" id="" value="{{number_format($totalPrice)}}"> --}}
                <input type="hidden" name="cart" id="">
            </form>
            <!-- Promo code -->

        </div>
        <!--Grid column-->

        </div>
    <!--Grid row-->

@endsection

