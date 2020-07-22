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
                <form action="{{route('slide.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                <input type="hidden" name="id" value="{{$slide->id}}">
                                <div class="form-group">
                                    <label for="">Tên Slide</label>
                                    <input type="text" class="form-control form-control-sm " name="name" value="{{$slide->name}}">
                                    @if($errors->first('name'))
                                    <span class="text-danger">{{$errors->first('name')}}</span>
                                    @endif
                                </div>
                                <div>
                                    <label for="">Ảnh</label>
                                    <img src="{{asset($slide->image)}}" alt="" width="100" >
                                    <input type="file" class="form-control" name="image" >
                                    @if($errors->first('image'))
                                    <span class="text-danger">{{$errors->first('image')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Tên sách</label>
                                   <select name="id_book" id=""  class="browser-default custom-select">
                                      @foreach ($book as $item)
                                   <option value="{{$item->id}}" selected>{{$item->title}}</option>
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
