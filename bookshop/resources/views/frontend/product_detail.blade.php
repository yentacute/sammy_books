@extends('layouts.main')

@section('content')

@include('layouts.includes.cate')
@if (session('message'))
    <span class="alert alert-success">
    <strong>{{session('message')}}</strong>
    </span>
@endif
<div class="col-sm-9 padding-right">
    @if(count($product)>0)
        @foreach ($product as $item)
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                <img src="{{ asset($item->image)}}" alt="" />
            </div>

        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
                <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                 <h2>{{$item->title}}</h2>
                <span>
                    <span>{{number_format($item->price)}}đ</span>
                    <del>Giá thị trường :{{number_format($item->sale_price)}}đ</del><br><br><br>
                    <label>Quantity:</label>
                    <input type="number" min="1" name="quantity"/>
                    @if(Auth::check()==true)
                    <a href="{{route('cart.add',['id'=>$item->id])}}"  class="btn btn-fefault cart">
                        <i class="fa fa-shopping-cart"></i>
                        Add to cart
                    </a>
                    @elseif(Auth::check()==false)
                        {!! 'Mời Bạn đăng nhập để mua' !!}
                    @endif
                </span>
                <p><b>Tình Trạng:</b>
                     @if ($item->status==1)
                        {{'Còn hàng'}}
                     @elseif($item->status ==-1)
                        {{'Hết hàng'}}
                     @endif
                </p>
                <p><b>Condition:</b> New</p>
            </div><!--/product-information-->
        </div>
    </div><!--/product-details-->
    <div class="category-tab shop-details-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
                <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
                <li><a href="#tag" data-toggle="tab">Tag</a></li>
                <li ><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
            </ul>
        </div>
        <div class="tab-content">
        	<div class="tab-pane fade active in" id="details" >
                <div class="col-sm-12">
                    <h4>Mô tả sản phẩm</h2>
                       <div>
                       <p>{!! $item->description !!}</p>
                       </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
<hr>
    <h3>Sản phẩm liên quan</h2>
        @foreach ($relate as $item)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                    <a href="{{route('books.detail',['id'=>$item->id])}}"><img src="{{ asset($item->image)}}" alt="" class="image"/></a>
                        <h2><a href="{{route('books.detail',['id'=>$item->id])}}" class="text-info"> {{$item->title}}</a></h2>
                        <p class="author"> {{$item->author}}</p>
                        <p class="pricesale">
                            <span class="finalsale"> {{number_format($item->price)}}đ</span>
                            <span class="sale-tag sale-tag-square">-36%</span>
                        </p>
                        <p class="underline"> {{number_format($item->sale_price)}}đ</p>
                        <span class="star"><i class="fa fa-star"></i></span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
@endsection
