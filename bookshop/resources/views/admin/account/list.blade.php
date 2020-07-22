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
                                                   Tên
                                                </th>
                                                <th>
                                                    Email
                                                </th>
                                                <th>
                                                    Avatar
                                                </th>
                                                <th>
                                                    Role
                                                </th>
                                                <th>
                                                    Status
                                                </th>
                                                <th>
                                                    Ngày tạo
                                                </th>
                                                <th>
                                                    Chức năng
                                                </th>
                                            </thead>
                                            <tbody>
                                                @if (count($user)>0)
                                                @foreach ($user as $item)
                                                <tr>
                                                    <td>{{$item->id}}</td>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->email}}</td>
                                                    <td><img src="{{asset($item->avatar)}}" alt="" width="100"></td>
                                                     <td>
                                                        @if ($item->level==1)
                                                        {{"admin"}}
                                                        @elseif($item->level==-1)
                                                        {{"user"}}
                                                        @endif
                                                     </td>
                                                    <td>
                                                        @if ($item->status==1)
                                                        {{"Hoạt động"}}
                                                        @elseif($item->status==-1)
                                                        {{"Bị Khóa"}}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{$item->created_at}}
                                                    </td>
                                                    <td>
                                                    {{-- <a href="{{route('cate.edit',['id'=>$item->id])}}" class="btn btn-success btn-sm">Sửa</a>
                                                    <a href="{{route('category.delete',['id'=>$item->id])}}" class="btn btn-danger btn-sm">Xóa</a> --}}
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif

                                            </tbody>
                                        </table>
                                    <span>{{$user->links()}}</span>
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
