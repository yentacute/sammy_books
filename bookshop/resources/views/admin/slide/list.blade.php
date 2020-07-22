@include('admin.share.head')
@include('admin.share.sidebar')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    var xoa = document.getElementById('xoa');
     function xoa (){
        Swal.fire(xoa,{
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
            })
    }
</script>


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
                                <a class="btn btn-warning btn-sm" href="{{route('slide.add')}}" role="button">Thêm</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class=" text-primary">
                                                <th>
                                                    ID
                                                </th>
                                                <th>
                                                    Tên slide
                                                </th>
                                                <th>
                                                    Anh
                                                </th>
                                                <th>
                                                    sách
                                                </th>
                                                <th>
                                                    trạng thái
                                                </th>
                                                <th>
                                                   Chức năng
                                                </th>
                                            </thead>
                                            <tbody>
                                                @if (count($ListSlide)>0)
                                                @foreach ($ListSlide as $item)
                                                <tr>
                                                    <td>{{$item->id}}</td>
                                                    <td>{{$item->name}}</td>
                                                    <td><img src="{{asset($item->image)}}" alt="" width="100px"></td>
                                                    <td>{{$item->getBook()->title}}</td>
                                                    <td>
                                                        @if ($item->status==1)
                                                        {{"Active"}}
                                                        @elseif($item->status==-1)
                                                        {{"Deactive"}}
                                                        @endif
                                                    </td>
                                                    <td>
                                                    <a href="{{route('slide.edit',['id'=>$item->id])}}" class="btn btn-success btn-sm">Sửa</a>
                                                    <a href="{{route('slide.delete',['id'=>$item->id])}}" class="btn btn-danger btn-sm" id="xoa">Xóa</a>
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
