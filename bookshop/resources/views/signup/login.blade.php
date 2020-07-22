@include('.layouts.includes.head')
 @include('.layouts.includes.header')
 <div class="content">
    <div class="signup">
     <i class="fas fa-user-plus"></i><h2>Đăng Ký tài khoản mới </h2>
        <form action="">
             <div class="form-group">
             <i class="fas fa-address-card"></i> <label for="">Full Name</label>
                 <input type="text" class="form-control form-control-sm "  name="fullname" >

             </div>
             <div class="form-group">
                 <label for="">username</label>
                 <input type="text" class="form-control form-control-sm "  name="username">

             </div>
             <div class="form-group">
             <i class="fas fa-key"></i> <label for="">password</label>
                 <input type="text" class="form-control form-control-sm " name="password">
             </div>
             <button class="btn btn-success">Đăng Ký</button>
        </form>

    </div>

</div>