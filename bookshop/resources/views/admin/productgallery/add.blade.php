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
                        @if(session('message'))
                        <span class="alert alert-danger" role="alert">
                            <strong>{{ session('message') }}</strong>
                        </span>
                         @endif
                  <form action="{{route('gallery.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label for="">Tên ảnh</label>
                                    <input type="text" class="form-control form-control-sm " name="name">
                                    @if($errors->first('name'))
                                    <span class="text-danger">{{$errors->first('name')}}</span>
                                    @endif
                                </div>
                                <div >
                                    <label for="">image</label>
                                    <input type="file" class="form-control form-control-sm " name="imager">
                                    @if($errors->first('imager'))
                                    <span class="text-danger">{{$errors->first('imager')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Sách</label>
                                   <select name="books_id" id="" class="browser-default custom-select">
                                       @foreach ($product as $item)
                                         <option value="{{$item->id}}">{{$item->title}}</option>
                                       @endforeach
                                   </select>
                                    @if($errors->first('books_id'))
                                    <span class="text-danger">{{$errors->first('books_id')}}</span>
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
