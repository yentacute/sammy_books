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
                    <form action="{{route('user.post')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">username</label>
                            <input type="text" class="form-control form-control-sm "  name="name">
                            @if($errors->first('name'))
                             <span class="text-danger">{{$errors->first('name')}}</span>
                             @endif

                        </div>
                        <div class="form-group">
                            <i class="fas fa-envelope"></i> <label for="">email</label>
                                <input type="email" class="form-control form-control-sm " name="email">
                                @if($errors->first('email'))
                                <span class="text-danger">{{$errors->first('email')}}</span>
                                @endif

                        </div>
                        <div class="form-group">
                        <i class="fas fa-key"></i> <label for="">password</label>
                            <input type="password" class="form-control form-control-sm " name="password">
                            @if($errors->first('password'))
                            <span class="text-danger">{{$errors->first('password')}}</span>
                            @endif

                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Password Confirmation:</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                   name="password_confirmation">
                        </div>
                        <div class="form-group">
                        <i class="fas fa-user-tie"></i> <label for="">Avatar</label>
                            <input type="file" class="form-control form-control-sm " name="avatar">
                            @if($errors->first('avatar'))
                            <span class="text-danger">{{$errors->first('avatar')}}</span>
                            @endif

                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control form-control-sm " name="level" value="1">

                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control form-control-sm " name="status" value="1">
                        </div>
                        <button class="btn btn-success">Thêm</button>
                     </form>
            </div>
        </div>
            @include('admin.share.footer')
            @include('admin.share.blowfooter')

        </div>
    </div>
</body>

</html>
