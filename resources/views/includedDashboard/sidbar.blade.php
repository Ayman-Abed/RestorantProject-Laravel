  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard.index')}}" class="brand-link">
      <img src="{{ asset('dashboard/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dashboard/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('dashboard.index')}}" class="d-block">Ayman Abed</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open ">
                                                                      {{-- To make the menu acticve when check the menu --}}
            <a href="{{route('dashboard.index')}}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : ''}}">
              <p>Dashboard</p>                                    
            </a>

          </li>



          <li class="nav-item has-treeview  {{ Request::is('admin/user/users') ? 'menu-open' : ''}} {{ Request::is('admin/user/trashed') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{ Request::is('admin/user/users') ? 'active' : ''}} {{ Request::is('admin/user/trashed') ? 'active' : ''}}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link  {{ Request::is('admin/user/users') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('user.trashed')}}" class="nav-link  {{ Request::is('admin/user/trashed') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-user-times"></i>
                  <p>Users Soft Deleted</p>
                </a>
              </li>
            </ul>
          </li>



          <li class="nav-item has-treeview {{ Request::is('admin/slider/sliders') ? 'menu-open' : ''}} {{ Request::is('admin/slider/trashed') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{ Request::is('admin/slider/sliders') ? 'active' : ''}} {{ Request::is('admin/slider/trashed') ? 'active' : ''}}">
              <i class="nav-icon fas fa-sliders-h"></i>
              <p>
                Slider
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('slider.index')}}" class="nav-link {{ Request::is('admin/slider/sliders') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-sliders-h"></i>
                  <p>Slider</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('slider.trashed')}}" class="nav-link {{ Request::is('admin/slider/trashed') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-sliders-h fas fa-trash"></i>
                  <p>Slider Soft Deleted</p>
                </a>
              </li>
            </ul>
          </li>



          <li class="nav-item has-treeview {{ Request::is('admin/category/categories') ? 'menu-open' : ''}} {{ Request::is('admin/category/trashed') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{ Request::is('admin/category/categories') ? 'active' : ''}} {{ Request::is('admin/category/trashed') ? 'active' : ''}}">
              <i class="nav-icon fas fa-fw fa-folder"></i>
              <p>
                Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('category.index')}}" class="nav-link {{ Request::is('admin/category/categories') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-fw fa-folder"></i>
                  <p>categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('category.trashed')}}" class="nav-link {{ Request::is('admin/category/trashed') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-fw fa-folder fas fa-trash"></i>
                  <p>Category Soft Deleted</p>
                </a>
              </li>
            </ul>
          </li>




          <li class="nav-item has-treeview {{ Request::is('admin/item/items') ? 'menu-open' : ''}} {{ Request::is('admin/item/trashed') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{ Request::is('admin/item/items') ? 'active' : ''}} {{ Request::is('admin/item/trashed') ? 'active' : ''}}">
              <i class="nav-icon fas fa-utensils"></i>
              <p>
                Item
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('item.index')}}" class="nav-link {{ Request::is('admin/item/items') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-utensils"></i>
                  <p>Items</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('item.trashed')}}" class="nav-link {{ Request::is('admin/item/trashed') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-fw fa-folder fas fa-trash"></i>
                  <p>Item Soft Deleted</p>
                </a>
              </li>
            </ul>
          </li>







          <li class="nav-item has-treeview {{ Request::is('admin/reservation/reservations') ? 'menu-open' : ''}} {{ Request::is('admin/reservation/trashed') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{ Request::is('admin/reservation/reservations') ? 'active' : ''}} {{ Request::is('admin/reservation/trashed') ? 'active' : ''}}">
              <i class="nav-icon fas fa-notes-medical"></i>
              <p>
                Reservation
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('reservation.index')}}" class="nav-link {{ Request::is('admin/reservation/reservations') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-notes-medical"></i>
                  <p>Reservation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('reservation.trashed')}}" class="nav-link {{ Request::is('admin/reservation/trashed') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-fw fa-folder fas fa-trash"></i>
                  <p>Reservation Soft Deleted</p>
                </a>
              </li>
            </ul>
          </li>





          <li class="nav-item has-treeview {{ Request::is('admin/contact/contacts') ? 'menu-open' : ''}} {{ Request::is('admin/contact/trashed') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{ Request::is('admin/contact/contacts') ? 'active' : ''}} {{ Request::is('admin/contact/trashed') ? 'active' : ''}}">
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Contact
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('contact.index')}}" class="nav-link {{ Request::is('admin/contact/contacts') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-comments"></i>
                  <p>Contacts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('contact.trashed')}}" class="nav-link {{ Request::is('admin/contact/trashed') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-fw fa-folder fas fa-trash"></i>
                  <p>Contact Soft Deleted</p>
                </a>
              </li>
            </ul>
          </li>








           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('setting.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>Settings</p>
                </a>
              </li>

            </ul>
          </li>








        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
