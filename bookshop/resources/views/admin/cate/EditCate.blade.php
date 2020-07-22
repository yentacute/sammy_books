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
                <form action="{{route('cate.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                                 <input type="hidden" name="id" value="{{$res->id}}">
                                <div class="form-group">
                                    <label for="">Tên Thư Mục</label>
                                    <input type="text" class="form-control form-control-sm " name="cate_name" value="{{$res->cate_name}}">
                                    @if($errors->first('cate_name'))
                                    <span class="text-danger">{{$errors->first('cate_name')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Tên Thư Mục</label>
                                <select name="status" id="" class="browser-default custom-select" >
                                     <option value="1">Active</option>
                                     <option value="-1">Deactive</option>
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

