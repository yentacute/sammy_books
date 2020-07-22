@include('layouts.includes.head')
@include('layouts.includes.header')
@section('content')
<section>

   <div class="container">
       @yield('content')
       <div class="row">
        <div class="col-sm-3">
            <div class="left-sidebar">
                <h2>Category</h2>
                <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                @if (count($join)>0)
                    @foreach ($join as $item)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h4 class="panel-title"><a href="{{route('books.cate',['id'=> $item->id])}}">{{$item->cate_name}}</a></h4>
                        </div>
                    </div>
                    @endforeach
                 @endif


                </div><!--/category-products-->

                {{-- <div class="brands_products"><!--brands_products-->
                    <h2>Brands</h2>
                    <div class="brands-name">
                        <ul class="nav nav-pills nav-stacked">
                     @if (count($publisher)>0)
                        @foreach ($publisher as $item)
                            <li><a href="#"> <span class="pull-right">(50)</span>{{$item->publisher_name}}</a></li>
                        @endforeach
                    @endif

                        </ul>
                    </div>
                </div><!--/brands_products--> --}}

                <div class="price-range"><!--price-range-->
                    <h2>Price Range</h2>
                    <div class="well text-center">
                         <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                         <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                    </div>
                </div><!--/price-range-->

                <div class="shipping text-center"><!--shipping-->
                    <img src="images/home/shipping.jpg" alt="" />
                </div><!--/shipping-->

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
                            <a href="#"><img src="{{ asset($item->image)}}" alt="" class="image"/></a>
                            <h2><a href="#" class="text-info"> {{$item->title}}</a></h2>
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

@include('layouts.includes.footer')
