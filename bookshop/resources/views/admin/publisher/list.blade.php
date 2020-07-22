@include('admin.share.head')
@include('admin.share.sidebar')
<body class="">

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
                                    <h4 class="card-title ">Account</h4>
                                    <p class="card-category"> Danh sách Account</p>
                                <a class="btn btn-warning btn-sm" href="{{route('publisher.add')}}" role="button">Thêm</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class=" text-primary">
                                                <th>
                                                    ID
                                                </th>
                                                <th>
                                                   Tên
                                                </th>
                                                <th>
                                                    Chức năng
                                                </th>
                                            </thead>
                                            <tbody>
                                                @if (count($publisher)>0)
                                                @foreach ($publisher as $item)
                                                <tr>
                                                    <td>{{$item->id}}</td>
                                                    <td>{{$item->publisher_name}}</td>
                                                    <td>
                                                    <a href="{{route('publisher.delete',['id'=>$item->id])}}" class="btn btn-danger btn-sm">Xóa</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif

                                            </tbody>
                                        </table>
                                    <span>{{$publisher->links()}}</span>
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
