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
                <form action="{{route('slide.add')}}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label for="">Tên Slide</label>
                                    <input type="text" class="form-control form-control-sm " name="name">
                                    @if($errors->first('name'))
                                    <span class="text-danger">{{$errors->first('name')}}</span>
                                    @endif
                                </div>
                                <div>
                                    <label for="">Ảnh</label>
                                    <input type="file" name="image" id="" class="form-control">
                                    @if($errors->first('image'))
                                    <span class="text-danger">{{$errors->first('image')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Tên sách</label>
                                   <select name="id_book" id=""  class="browser-default custom-select">
                                      @foreach ($books as $item)
                                   <option value="{{$item->id}}">{{$item->title}}</option>
                                      @endforeach
                                   </select>
                                    @if($errors->first('id_book'))
                                    <span class="text-danger">{{$errors->first('id_book')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Trạng Thái</label>
                                   <select name="status" id="" class="browser-default custom-select">
                                       <option value="1">Hiện</option>
                                       <option value="-1">Ẩn</option>
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
