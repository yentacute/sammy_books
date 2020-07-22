@extends('layouts.main')
@section('content')
@include('layouts.includes.cate')
@if (session('message'))
            <span class="alert alert-danger" role="alert">
            <strong>{{session('message')}}</strong>
            </span>
        @endif
<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Danh Sách Sản Phẩm</h2>

        @foreach ($product as $item)
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
    <span>{{$product->links()}}</span>
@endsection
