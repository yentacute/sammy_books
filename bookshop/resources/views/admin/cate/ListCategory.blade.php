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
                                    <h4 class="card-title ">Danh sách sản phẩm</h4>
                                    <p class="card-category"> Hiển thị danh sách</p>
                                <a class="btn btn-warning btn-sm" href="{{route('category.add')}}" role="button">Thêm</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class=" text-primary">
                                                <th>
                                                    ID
                                                </th>
                                                <th>
                                                    Tên danh mục
                                                </th>
                                                <th>
                                                    Trạng Thái
                                                </th>
                                                <th>
                                                    Chức năng
                                                </th>
                                            </thead>
                                            <tbody>
                                                @if (count($CateList)>0)
                                                @foreach ($CateList as $item)
                                                <tr>
                                                    <td>{{$item->id}}</td>
                                                    <td>{{$item->cate_name}}</td>
                                                    <td>
                                                        @if ($item->status==1)
                                                        {{"Active"}}
                                                        @elseif($item->status==-1)
                                                        {{"Deactive"}}
                                                        @endif
                                                    </td>
                                                    <td>
                                                    <a href="{{route('cate.edit',['id'=>$item->id])}}" class="btn btn-success btn-sm">Sửa</a>
                                                    <a href="{{route('category.delete',['id'=>$item->id])}}" class="btn btn-danger btn-sm">Xóa</a>
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
