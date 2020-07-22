<div class="row">
    <div class="col-sm-3">
        <div class="left-sidebar">
            <h2>Category</h2>
            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            @if (count($cate)>0)
                @foreach ($cate as $item)
                <div class="panel panel-default">
                    <div class="panel-heading">
                    <h4 class="panel-title"><a href="{{route('books.cate',['id'=> $item->id])}}">{{$item->cate_name}}</a></h4>
                    </div>
                </div>
                @endforeach
             @endif
            </div><!--/category-products-->

            <div class="brands_products"><!--brands_products-->
                <h2>Nhà Xuất Bản</h2>
                <div class="brands-name">
                    <ul class="nav nav-pills nav-stacked">
                 @if (count($publisher)>0)
                    @foreach ($publisher as $item)
                        <li><a href="{{route('books.publisher',['id'=>$item->id])}}"> <span class="pull-right"></span>{{$item->publisher_name}}</a></li>
                    @endforeach
                @endif

                    </ul>
                </div>
            </div><!--/brands_products-->
        </div>
    </div>
