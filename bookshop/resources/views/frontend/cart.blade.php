@extends('layouts.main')
@section('content')
<script src="https://use.fontawesome.com/c560c025cf.js"></script>
<div class="container">
    @if (session('message'))
        <span class="alert alert-danger">
        <strong>{{session('message')}}</strong>
        </span>
    @endif
    <form action="" method="post">
        @csrf
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th class="text-center">Price</th>
                <th class="text-center">Total</th>
                <th> </th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalPrice = 0;
            @endphp
            @if (session('cart'))   
            @foreach (session('cart') as $id=>$detail)
            @php
                $price = $detail['price'] * $detail['quantity'];
                $totalPrice += $price;
            @endphp
            <tr>
                <td class="col-sm-8 col-md-6">
                <div class="media">
                <a class="thumbnail pull-left" href="#"> <img class="media-object" src="{{asset($detail['image'])}}" style="width: 72px; height: 72px;"> </a>
                    <div class="media-body">
                    <h4 class="media-heading"><a href="#">{{$detail['title']}}</a></h4>
                    </div>
                </div></td>
                <td class="col-sm-1 col-md-1" style="text-align: center">
                <input type="number" class="form-control" min= 1 max= 99 value ="{{$detail['quantity']}}" name="quantity_{{$detail['quantity']}}">
                </td>
                <td class="col-sm-1 col-md-1 text-center"><strong>{{number_format($detail['price'])}}đ</strong></td>
            <td class="col-sm-1 col-md-1 text-center"><strong>{{number_format( $price)}}đ</strong></td>
                <td class="col-sm-1 col-md-1">
                <a href="{{route('cart.remove')}}" class="btn btn-danger">
                    <span class="glyphicon glyphicon-remove"></span> Remove
                </a></td>
            </tr>
            @endforeach
            @endif
            <tr>
                <td>   </td>
                <td>   </td>
                <td>   </td>
            <td><h3><a href="{{route('cart.update')}}" class="btn btn-outline-success">Cập nhật giỏ hàng</a></h3></td>
            </tr>
            <tr>
                <td>   </td>
                <td>   </td>
                <td>   </td>
            <td><h3>Total</h3></td>
                <td class="text-right"><h3><strong>{{number_format($totalPrice)}}đ</strong></h3></td>
            </tr>
            <tr>
                <td>   </td>
                <td>   </td>
                <td>   </td>
                <td>
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                </button></td>
                <td>
                <a href="{{route('product.checkout')}}" class="btn btn-success">
                    Checkout <span class="glyphicon glyphicon-play"></span>
                </a></td>
            </tr>
        </tbody>
        </table>
    </form>
   
     </div>
    </div>
</div>
@endsection
