@include('admin.share.head')
@include('admin.share.sidebar')
        <div class="main-panel">
            <!-- Navbar -->
           @include('admin.share.top')
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title ">Danh sách order</h4>
                                    <p class="card-category"> Hiển thị danh sách</p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class=" text-primary">
                                                <th>
                                                    ID
                                                </th>
                                                <th>
                                                    Fullname
                                                </th>
                                                <th>
                                                    Tên đăng nhập
                                                </th>
                                                <th>
                                                   Email
                                                </th>
                                                <th>
                                                    Số điện thoai
                                                </th>
                                                <th>
                                                   địa chỉ
                                                </th>
                                                <th>
                                                  zip
                                                </th>
                                                <th>
                                                  cart
                                                </th>
                                                <th>
                                                    Tổng tiền
                                                 </th>
                                                <th>
                                                    chức năng
                                                 </th>
                                            </thead>
                                            <tbody>
                                                @if (count($order)>0)
                                                @foreach ($order as $item)
                                                <tr>
                                                    <td>{{$item->id}}</td>
                                                    <td>{{$item->fullname}}</td>
                                                    <td>{{$item->username}}</td>
                                                    <td>{{$item->email}}</td>
                                                    <td>0{{$item->phone}}</td>
                                                    <td>{{$item->address}}</td>
                                                    <td>
                                                        {{$item->zip}}
                                                    </td>
                                                    <td>
                                                        {{$item->cart}}
                                                    </td>
                                                    <td>
                                                        {{$item->totalprice}}
                                                    </td>
                                                    <td>
                                                    <a href="{{route('checkout.delete',['id'=>$item->id])}}" class="btn btn-danger btn-sm">Xóa</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.share.footer')
            @include('admin.share.blowfooter')

        </div>
    </div>
</body>

</html>
