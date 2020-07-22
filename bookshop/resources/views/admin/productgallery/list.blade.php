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
                                                    Tên ảnh
                                                </th>
                                                <th>
                                                    Ảnh
                                                </th>
                                                <th>
                                                    Sách
                                                </th>
                                                <th>
                                                    chức năng
                                                </th>
                                            </thead>
                                            <tbody>
                                                @if (count($gallery)>0)
                                                @foreach ($gallery as $item)
                                                <tr>
                                                    <td>{{$item->id}}</td>
                                                    <td>{{$item->name}}</td>
                                                    <td>
                                                        <img src="{{asset($item->imager)}}" alt="" width="100">
                                                    </td>
                                                    <td>
                                                        {{$item->title}}
                                                    </td>
                                                    <td>
                                                    <a href="{{route('gallery.delete',['id'=>$item->id])}}" class="btn btn-danger btn-sm">Xóa</a>
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
