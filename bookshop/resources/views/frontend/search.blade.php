@extends('layouts.main')
@section('content')

<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Tìm Kiếm</h2>
        <div>
        <p>Tìm thấy {{count($posts)}} sản phẩm</p>
        </div>
    @if (count($posts)>0)
        @foreach ($posts as $item)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                    <a href="{{route('books.detail',['id'=>$item->id])}}"><img src="{{ asset($item->image)}}" alt="" class="image"/></a>
                        <h2><a href="{{route('books.detail',['id'=>$item->id])}}" class="text-info"> {{$item->title}}</a></h2>
                        <p class="author"> {{$item->author}}</p>
                        <p class="pricesale">
                            <span class="finalsale"> {{number_format($item->sale_price)}}đ</span>
                            <span class="sale-tag sale-tag-square">-36%</span>
                        </p>
                        <p class="underline"> {{number_format($item->price)}}</p>
                        <span class="star"><i class="fa fa-star"></i></span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endif
    </div><!--features_items-->
@endsection
