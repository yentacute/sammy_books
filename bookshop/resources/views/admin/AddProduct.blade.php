@include('admin.share.head')
@include('admin.share.sidebar')

<body class="">
    <div class="main-panel">
        <!-- Navbar -->
        <div>
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
          @yield('nav')
          @include('admin.share.top')
        </nav>
    </div>
            <div class="content">
                <div class="container-fluid">
                            <form action="{{route('admin.AddProduct')}}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label for="">Tên Sách</label>
                                    <input type="text" class="form-control form-control-sm " name="title">
                                    @if($errors->first('title'))
                                    <span class="text-danger">{{$errors->first('title')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Giá bán</label>
                                    <input type="text" class="form-control form-control-sm" name="price">
                                    @if($errors->first('price'))
                                    <span class="text-danger">{{$errors->first('price')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Giá ảo</label>
                                    <input type="text" class="form-control form-control-sm" name="sale_price">
                                    @if($errors->first('sale_price'))
                                    <span class="text-danger">{{$errors->first('sale_price')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Danh Mục</label>
                                    <select name="cate_id" id="" class="browser-default custom-select">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->cate_name }}</option>
                                    @endforeach
                                    </select>
                                    @if($errors->first('id_genre'))
                                    <span class="text-danger">{{$errors->first('id_genre')}}</span>
                                    @endif

                                </div>
                                <div>
                                    <label for="">Ảnh </label>
                                    <input type="file" class="form-control" name="image">
                                    @if($errors->first('image'))
                                    <span class="text-danger">{{$errors->first('image')}}</span>
                                    @endif
                               </div>


                                <div class="form-group">
                                    <label for="">Miêu tả</label>
                                    <textarea type="text" class="form-control form-control-sm" name="description"  id="editor"></textarea>
                                    @if($errors->first('description'))
                                    <span class="text-danger">{{$errors->first('description')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Thể loại</label>
                                   <input type="text" class="form-control form-control-sm" name="genre" id="">
                                    @if($errors->first('genre'))
                                    <span class="text-danger">{{$errors->first('genre')}}</span>
                                    @endif

                                </div>
                                <div class="form-group">
                                    <label for="">Tác Giả</label>
                                    <input type="text" name="author" class="form-control form-control-sm">
                                    @if($errors->first('author'))
                                    <span class="text-danger">{{$errors->first('author')}}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="">Nhà phát hành</label>
                                    <select name="publisher_id" id="" class="browser-default custom-select">
                                        @foreach ($publishers as $publisher)
                                        <option value="{{ $publisher->id }}">{{ $publisher->publisher_name }}</option>
                                        @endforeach
                                        </select>

                                    @if($errors->first('publisher'))
                                    <span class="text-danger">{{$errors->first('publisher')}}</span>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <label for="">Trạng thái</label>
                                    <select name="status" id="" class="browser-default custom-select">
                                        <option value="1">Còn hàng</option>
                                        <option value="-1">Hết hàng</option>
                                    </select>
                                    @if($errors->first('status'))
                                    <span class="text-danger">{{$errors->first('status')}}</span>
                                    @endif
                                </div>
                                <button class="btn btn-success">Submit</button>
                            </form>
                        </div>

                            </div>
                        </div>

            @include('admin.share.footer')
            @include('admin.share.blowfooter')

        </div>
    </div>
</body>

</html>
