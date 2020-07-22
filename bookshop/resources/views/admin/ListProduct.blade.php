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
                                    <a class="btn btn-warning btn-sm" href="{{route('admin.AddProduct')}}" role="button">Thêm</a>
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
                                                        Giá
                                                    </th>
                                                    <th>
                                                        Giá ảo
                                                    </th>
                                                    <th>
                                                        Danh mục
                                                    </th>
                                                    <th>
                                                        Ảnh
                                                    </th>
                                                    <th>
                                                        Thể loại
                                                    </th>
                                                    <th>
                                                        Tác giả
                                                    </th>
                                                    <th>
                                                        Nhà phát hành
                                                    </th>
                                                    <th>
                                                        Trạng Thái
                                                    </th>
                                                    <th>
                                                        Chức năng
                                                    </th>

                                                </thead>
                                                <tbody>
                                                    @if (count($ListPro)>0)
                                                    @foreach ($ListPro as $item)
                                                    <tr>
                                                        <td>
                                                            {{$item->id}}
                                                        </td>
                                                        <td>
                                                            {{$item->title}}
                                                        </td>
                                                        <td>
                                                            {{$item->price}}
                                                        </td>
                                                        <td>
                                                            {{$item->sale_price}}
                                                        </td>
                                                        <td>
                                                            {{$item->getCate()}}
                                                        </td>
                                                        <td>
                                                        <img src="{{ asset($item['image'])}}" width="80" />
                                                        </td>

                                                        <td>
                                                            {{$item->genre}}
                                                        </td>

                                                        <td class="text-primary">
                                                            {{$item->author}}
                                                        </td>
                                                        <td>
                                                            {{$item->getName()->publisher_name}}
                                                        </td>
                                                        <td class="text-primary">
                                                            @if(($item->status) == 1)
                                                             {{ "con hang" }}
                                                           @elseif(($item->status) == -1)
                                                            {{ "het hang" }}
                                                           @endif
                                                        </td>
                                                        <td>
                                                        <a class="btn btn-success btn-sm" href="{{route('product.edit',['id'=>$item->id])}}" role="button">Sửa</a>
                                                        <a class="btn btn-danger btn-sm" href="{{route('admin.product.delete',['id'=>$item->id])}}" role="button" id="delete">Xóa</a>
                                                        </td>

                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                    <span>{{$ListPro->links()}}</span>

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
