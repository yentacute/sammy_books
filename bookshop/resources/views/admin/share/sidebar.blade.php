<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
        <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
        <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
      Creative Tim
    </a></div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item  ">
                    <a class="nav-link" href="./dashboard.html">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item ">
                <a class="nav-link" href="{{route('user.list')}}">
                        <i class="material-icons">person</i>
                        <p>User Profile</p>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('user.list')}}" class="dropdown-item">Danh sách người dùng</a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item">Thêm quản trị viên</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('admin.ListProduct')}}">
                        <i class="material-icons">product</i>
                        <p>Product</p>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('admin.AddProduct')}}" class="dropdown-item">Thêm sản phẩm</a>
                        </li>
                        <li>
                            <a href="{{route('admin.ListProduct')}}" class="dropdown-item">Danh sách sản phẩm</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('category.list')}}">
                        <i class="material-icons">library_books</i>
                        <p>Danh mục</p>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('category.list')}}" class="dropdown-item">Hiển thị danh mục</a>
                        </li>
                        <li>
                            <a href="{{route('category.show')}}" class="dropdown-item">thêm danh mục</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('slide.list')}}">
                        <i class="material-icons">bubble_chart</i>
                        <p>Slide</p>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('slide.list')}}" class="dropdown-item">Hiển thị Slide</a>
                        </li>
                        <li>
                            <a href="{{route('slide.create')}}" class="dropdown-item">thêm Slide</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="./map.html">
                        <i class="material-icons">location_ons</i>
                        <p>Maps</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="./notifications.html">
                        <i class="material-icons">notifications</i>
                        <p>Notifications</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="./rtl.html">
                        <i class="material-icons">language</i>
                        <p>RTL Support</p>
                    </a>
                </li>
                <li class="nav-item active-pro ">
                    <a class="nav-link" href="./upgrade.html">
                        <i class="material-icons">unarchive</i>
                        <p>Upgrade to PRO</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
