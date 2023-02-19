<div>
    <header id="header" class="header fixed-top d-flex align-items-center">
   <style>
      .sidebar-nav .nav-link {
         background-color: transparent;
         color: #012970;
      }

      #homepage-banner-nav, #homepage-banner-first {
         margin-left: 10px;
      }

      .bi-child {
         margin-left: 10px;
      }

      .bi.bi-chevron-down {
         font-size: 16px !important;
         margin-right: 10px !important;
      }
   </style>
         <div class="d-flex align-items-center justify-content-between"> <a href="index.html" class="logo d-flex align-items-center"> <img src="{{asset('assets/img/logo.png')}}" alt=""> <span class="d-none d-lg-block">Admin</span> </a> <i class="bi bi-grid toggle-sidebar-btn"></i></div>
         <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
               <li class="nav-item d-block d-lg-none"> <a class="nav-link nav-icon search-bar-toggle " href="#"> <i class="bi bi-search"></i> </a></li>
               <li class="nav-item dropdown">
                  <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown"> <i class="bi bi-bell"></i> <span class="badge bg-primary badge-number rounded-pill bg-danger">4</span> </a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                     <li class="dropdown-header"> You have 4 new notifications <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a></li>
                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     <li class="notification-item">
                        <i class="bi bi-exclamation-circle text-warning"></i>
                        <div>
                           <h4>Lorem Ipsum</h4>
                           <p>Quae dolorem earum veritatis oditseno</p>
                           <p>30 min. ago</p>
                        </div>
                     </li>
                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     <li class="notification-item">
                        <i class="bi bi-x-circle text-danger"></i>
                        <div>
                           <h4>Atque rerum nesciunt</h4>
                           <p>Quae dolorem earum veritatis oditseno</p>
                           <p>1 hr. ago</p>
                        </div>
                     </li>
                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     <li class="notification-item">
                        <i class="bi bi-check-circle text-success"></i>
                        <div>
                           <h4>Sit rerum fuga</h4>
                           <p>Quae dolorem earum veritatis oditseno</p>
                           <p>2 hrs. ago</p>
                        </div>
                     </li>
                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     <li class="notification-item">
                        <i class="bi bi-info-circle text-primary"></i>
                        <div>
                           <h4>Dicta reprehenderit</h4>
                           <p>Quae dolorem earum veritatis oditseno</p>
                           <p>4 hrs. ago</p>
                        </div>
                     </li>
                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     <li class="dropdown-footer"> <a href="#">Show all notifications</a></li>
                  </ul>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown"> <i class="bi bi-chat-left-text"></i> <span class="badge bg-info badge-number rounded-pill">3</span> </a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                     <li class="dropdown-header"> You have 3 new messages <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a></li>
                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     <li class="message-item">
                        <a href="#">
                           <img src="{{asset('assets/img/messages-1.jpg')}}" alt="" class="rounded-circle">
                           <div>
                              <h4>Jassa</h4>
                              <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                              <p>4 hrs. ago</p>
                           </div>
                        </a>
                     </li>
                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     <li class="message-item">
                        <a href="#">
                           <img src="{{asset('assets/img/messages-2.jpg')}}" alt="" class="rounded-circle">
                           <div>
                              <h4>Jassa</h4>
                              <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                              <p>6 hrs. ago</p>
                           </div>
                        </a>
                     </li>
                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     <li class="message-item">
                        <a href="#">
                           <img src="{{asset('assets/img/messages-3.jpg')}}" alt="" class="rounded-circle">
                           <div>
                              <h4>Jassa</h4>
                              <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                              <p>8 hrs. ago</p>
                           </div>
                        </a>
                     </li>
                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     <li class="dropdown-footer"> <a href="#">Show all messages</a></li>
                  </ul>
               </li>
               <li class="nav-item dropdown pe-3">
                  <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown"> <img src="{{asset('assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle"> <span class="d-none d-md-block dropdown-toggle ps-2">Jassa</span> </a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                     <li class="dropdown-header">
                        <h6>Jassa</h6>
                        <span>Web Designer</span>
                     </li>
                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     <li> <a class="dropdown-item d-flex align-items-center" href="users-profile.html"> <i class="bi bi-person"></i> <span>My Profile</span> </a></li>
                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     <li> <a class="dropdown-item d-flex align-items-center" href="users-profile.html"> <i class="bi bi-gear"></i> <span>Account Settings</span> </a></li>
                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     <li> <a class="dropdown-item d-flex align-items-center" href="pages-faq.html"> <i class="bi bi-question-circle"></i> <span>Need Help?</span> </a></li>
                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     <li> <a class="dropdown-item d-flex align-items-center" href="#"> <i class="bi bi-box-arrow-right"></i> <span>Sign Out</span> </a></li>
                  </ul>
               </li>
            </ul>
         </nav>
      </header>
      <aside id="sidebar" class="sidebar">
         <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item"> <a class="nav-link " href="{{route('admin.dashboard')}}"> <i class="bi bi-grid"></i> <span>Dashboard</span> </a></li>
            <li class="nav-item">
               <a class="nav-link collapsed" data-bs-target="#products-nav" data-bs-toggle="collapse" href="#"> <i class="bi bi-box"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i> </a>
               <ul id="products-nav" class="nav-content collapse ">
                  <li> <a href="{{route('admin.products')}}"> <i class="bi bi-circle"></i><span>All Products</span> </a></li>
                  <li> <a href="{{route('admin.addproduct')}}"> <i class="bi bi-circle"></i><span>Add New Product</span> </a></li>
               </ul>
            </li>
            <li class="nav-item">
               <a class="nav-link collapsed" data-bs-target="#categories-nav" data-bs-toggle="collapse" href="#"> <i class="bi bi-diagram-3"></i><span>Categories</span><i class="bi bi-chevron-down ms-auto"></i> </a>
               <ul id="categories-nav" class="nav-content collapse ">
                  <li> <a href="{{route('admin.categories')}}"> <i class="bi bi-circle"></i><span>All Categories</span> </a></li>
                  <li> <a href="{{route('admin.addcategory')}}"> <i class="bi bi-circle"></i><span>Add New Category</span> </a></li>
               </ul>
            </li>
            <li class="nav-item">
               <a class="nav-link collapsed" data-bs-target="#coupons-nav" data-bs-toggle="collapse" href="#"> <i class="bi bi-gift"></i><span>Coupons</span><i class="bi bi-chevron-down ms-auto"></i> </a>
               <ul id="coupons-nav" class="nav-content collapse ">
                  <li> <a href="{{route('admin.coupons')}}"> <i class="bi bi-circle"></i><span>All Coupons</span> </a></li>
                  <li> <a href="{{route('admin.addcoupon')}}"> <i class="bi bi-circle"></i><span>Add New Coupon</span> </a></li>
               </ul>
            </li>
            <li class="nav-item">
               <a class="nav-link collapsed" data-bs-target="#sliders-nav" data-bs-toggle="collapse" href="#"> <i class="bi bi-stack"></i><span>Sliders</span><i class="bi bi-chevron-down ms-auto"></i> </a>
               <ul id="sliders-nav" class="nav-content collapse ">
                  <li> <a href="{{route('admin.homeslider')}}"> <i class="bi bi-circle"></i><span>All Sliders</span> </a></li>
                  <li> <a href="{{route('admin.addhomeslider')}}"> <i class="bi bi-circle"></i><span>Add New Slider</span> </a></li>
               </ul>
            </li>
            <li class="nav-item">
               <a class="nav-link collapsed" data-bs-target="#attributes-nav" data-bs-toggle="collapse" href="#"> <i class="bi bi-layout-text-window-reverse"></i><span>Attributes</span><i class="bi bi-chevron-down ms-auto"></i> </a>
               <ul id="attributes-nav" class="nav-content collapse ">
                  <li> <a href="{{route('admin.attributes')}}"> <i class="bi bi-circle"></i><span>All Attributes</span> </a></li>
                  <li> <a href="{{route('admin.add_attribute')}}"> <i class="bi bi-circle"></i><span>Add New Attribute</span> </a></li>
               </ul>
            </li>
            <li class="nav-item">
               <a class="nav-link collapsed" data-bs-target="#banners-nav" data-bs-toggle="collapse" href="#"> <i class="bi bi-card-image"></i><span>Banners</span><i class="bi bi-chevron-down ms-auto"></i> </a>
               <ul id="banners-nav" class="nav-content collapse">
                  <li> 
                     <a href="" class="nav-link collapsed" data-bs-target="#homepage-banner-nav" data-bs-toggle="collapse"> <i class="bi bi-circle"></i><span>Homepage Banner</span><i class="bi bi-chevron-down ms-auto"></i></a>
                     <ul id="homepage-banner-nav" class="nav-content collapse ">
                        <li> 
                           <a href="#" class="nav-link collapsed" data-bs-target="#homepage-banner-first" data-bs-toggle="collapse"> <i class="bi bi-circle-fill"></i><span>Homepage Banner First</span><i class="bi bi-chevron-down bi-child ms-auto"></i> </a>
                           <ul id="homepage-banner-first" class="nav-content collapse">
                              <li> <a href="{{route('admin.homepageBannerFirstLeft')}}"> <i class="bi bi-circle"></i><span>Banner First Left</span> </a></li>
                              <li> <a href="{{route('admin.homepageBannerFirstRight')}}"> <i class="bi bi-circle"></i><span>Banner First Right</span> </a></li>
                           </ul>
                        </li>
                        <li> <a href="{{route('admin.homepageBannerSecond')}}"> <i class="bi bi-circle-fill"></i><span>Homepage Banner Second</span> </a></li>
                     </ul>
                  </li>
                  <li> <a href="{{route('admin.shoppageBanner')}}"> <i class="bi bi-circle"></i><span>Shoppage Banner</span> </a></li>
               </ul>
            </li>
            <li class="nav-item">
               <a class="nav-link collapsed" data-bs-target="#popups-nav" data-bs-toggle="collapse" href="#"> <i class="bi bi-front"></i><span>Popups</span><i class="bi bi-chevron-down ms-auto"></i> </a>
               <ul id="popups-nav" class="nav-content collapse ">
                  <li> <a href="{{route('admin.Popup')}}"> <i class="bi bi-circle"></i><span>All Popups</span> </a></li>
                  <li> <a href="{{route('admin.addPopup')}}"> <i class="bi bi-circle"></i><span>Add New Popup</span> </a></li>
               </ul>
            </li>
            <li class="nav-item"> <a class="nav-link " href="{{route('admin.orders')}}"> <i class="bi bi-cart4"></i> <span>Orders</span> </a></li>
            <li class="nav-item"> <a class="nav-link " href="{{route('admin.contact')}}"> <i class="bi bi-envelope"></i> <span>Messages</span> </a></li>
            <li class="nav-item"> <a class="nav-link " href="{{route('admin.settings')}}"> <i class="bi bi-gear"></i> <span>Settings</span> </a></li>
            <li class="nav-item"> <a class="nav-link " href="{{route('admin.subscriber')}}"> <i class="bi bi-person"></i> <span>Subscribers</span> </a></li>
            <li class="nav-item"> <a class="nav-link " href="{{route('admin.homecategories')}}"> <i class="bi bi-shop"></i> <span>Home Categories</span> </a></li>
            <li class="nav-item"> <a class="nav-link " href="{{route('admin.sale')}}"> <i class="bi bi-alarm"></i> <span>Sale Settings</span> </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('Logout-form').submit();"><i class="bi bi-power"></i> <span>Logout</span></a>
      <form id="Logout-form" method="POST" action="{{route('logout')}}">
        @csrf            
      </form>
            </li>
         </ul>
      </aside>
</div>
