@extends('layouts.main')
@section('content')
<section id="slider"><!--slider-->
    @if (session('message'))
        <span class="alert alert-danger">
        <strong>{{session('message')}}</strong>
        </span>

    @endif
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php $i=0; ?>
                             @foreach ($slide as $item)
                        <li data-target="#slider-carousel" data-slide-to="{{$i}}"
                            @if ($i==0)
                            class="active"
                            @endif
                         ></li>
                         @endforeach
                         <?php $i++; ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php $i=0; ?>
                        @foreach ($slide as $item)
                                <div
                                    @if ($i==0)
                                    class="item active"
                                    @else
                                    class="item"
                                    @endif
                                >
                                <?php $i++; ?>
                    <a href="{{route('books.detail',['id'=>$item->id])}}"><img src="{{asset($item->image)}}" alt="" class="d-block w-100" /></a>
                         </div>
                    @endforeach

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
</section>

    @include('layouts.includes.cate')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Sách Mới Cập Nhật</h2>
        @if (count($ListPro)>0)
            @foreach ($ListPro as $item)
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
                            <p class="underline"> {{number_format($item->sale_price)}}</p>
                            <span class="star"><i class="fa fa-star"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
        </div><!--features_items-->
        <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">Sách hay tuyển chọn</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($randomProduct as $item)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                    <a href="{{route('books.detail',['id'=>$item->id])}}"><img src="{{asset($item->image)}}" alt="" /></a>
                                    <h2><a href="{{route('books.detail',['id'=>$item->id])}}" class="text-info">{{$item->title}}</a></h2>
                                    <p class="author">{{$item->author}}</p>
                                        <p class="pricesale">
                                            <span class="finalsale">{{$item->price}}</span>
                                            <span class="sale-tag sale-tag-square">-36%</span>
                                        </p>
                                        <p class="underline">{{$item->sale_price}}</p>
                                        <span class="star"><i class="fa fa-star"></i></span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div><!--/recommended_items-->
    </div>
</div>
@endsection
