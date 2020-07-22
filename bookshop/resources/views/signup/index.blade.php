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
             <div class="form-group">
             <i class="fas fa-user-tie"></i> <label for="">Avatar</label>
                 <input type="file" class="form-control form-control-sm " name="avatar">

             </div>
             <div class="form-group">
             <i class="fas fa-mobile"></i> <label for="">phone</label>
                 <input type="text" class="form-control form-control-sm " name="phone">

             </div>
             <div class="form-group">
             <i class="far fa-address-card"></i>  <label for="">address</label>
                 <input type="text" class="form-control form-control-sm " name="address">

             </div>
             <div class="form-group">
             <i class="fas fa-envelope"></i> <label for="">email</label>
                 <input type="text" class="form-control form-control-sm " name="email">

             </div>
             <div class="form-group">
                 
                 <input type="hidden" class="form-control form-control-sm " name="level" value="-1">

             </div>
             <div class="form-group">
                 <input type="hidden" class="form-control form-control-sm " name="status" value="1">
             </div>
             <button class="btn btn-success">Đăng Ký</button>
             
         </form>

     </div>

 </div>