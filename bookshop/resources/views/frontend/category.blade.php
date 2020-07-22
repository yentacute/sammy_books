@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-sm-3">
        <div class="left-sidebar">
            <h2>Category</h2>
            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                @foreach ($Cate as $item)
                <div class="panel panel-default">
                    <div class="panel-heading">
                    <h4 class="panel-title"><a href="{{route('books.cate',['id'=> $item->id])}}">{{$item->cate_name}}</a></h4>
                    </div>
                </div>
                @endforeach

            </div><!--/category-products-->

        </div>
    </div>

   <div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Features Items</h2>
    @foreach ($pro as $item)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <a href="{{route('books.detail',['id'=>$item->id])}}"><img src="{{ asset($item->image)}}" alt="" class="image"/></a>
                        <h2><a href="{{route('books.detail',['id'=>$item->id])}}" class="text-info"> {{$item->title}}</a></h2>
                        <p class="author"> {{$item->author}}</p>
                        <p class="pricesale">
                            <span class="finalsale"> {{$item->sale_price}}đ</span>
                            <span class="sale-tag sale-tag-square">-36%</span>
                        </p>
                        <p class="underline"> {{$item->price}}</p>
                        <span class="star"><i class="fa fa-star"></i></span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
   </div>
</div>
@endsection
