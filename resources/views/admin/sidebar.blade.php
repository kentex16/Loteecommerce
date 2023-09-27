
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a class="sidebar-brand brand-logo" ><img src="admin/assets/images/Logo.png" alt="logo" /></a>
      <a class="sidebar-brand brand-logo-mini"><img src="admin/assets/images/Logo.png" alt="logo" /></a>
    </div>
    <ul class="nav">
      <li class="nav-item profile">
        <div class="profile-desc">
          <div class="profile-pic">
            <div class="count-indicator">
              <img class="img-xs rounded-circle " src="admin/assets/images/faces/client.jpg" alt="">
              <span class="count bg-success"></span>
            </div>
            <div class="profile-name">
              <h5 class="mb-0 font-weight-normal">Alvin Novero</h5>
              <span>Owner </span>
            </div>
          </div>
          <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
          <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-settings text-primary"></i>
                </div>
              </div>
              
            </a>
          </div>
        </div>
      </li>
      <li class="nav-item nav-category">
        <span class="nav-link">Menu</span>
      </li>
    
    
        <li class="nav-item menu-items">
          <a class="nav-link" href="{{url('/view_product')}}">
            <span class="menu-icon">
              <i class="mdi mdi-plus-circle"></i>
            </span>
            <span class="menu-title">Add Products</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="{{url('/show_product')}}">
            <span class="menu-icon">
              <i class="mdi mdi-eye"></i>
            </span>
            <span class="menu-title">Show Products</span>
          </a>
        </li>
        
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('view_category')}}">
          <span class="menu-icon">
            <i class="mdi mdi-playlist-play"></i>
          </span>
          <span class="menu-title">Categories</span>
        </a>
      </li>
  
    </ul>
  </nav>