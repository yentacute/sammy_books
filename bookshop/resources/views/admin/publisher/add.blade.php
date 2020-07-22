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
                <form action="{{route('publisher.post')}}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label for="">Tên nhà phát hành</label>
                                    <input type="text" class="form-control form-control-sm " name="publisher_name">
                                    @if($errors->first('publisher_name'))
                                    <span class="text-danger">{{$errors->first('publisher_name')}}</span>
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
