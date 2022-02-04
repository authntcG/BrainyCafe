<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
  <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
          aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
          target="_blank">
          <img src="{{ asset('/admin/assets/img/favicon.png') }}" class="navbar-brand-img h-100" alt="main_logo">
          <span class="ms-1 font-weight-bold text-white">Brainy Cafe Dashboard</span>
      </a>
  </div>
  <hr class="horizontal light mt-0 mb-2">
  <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link text-white {{ ($title === "Beranda") ? 'active' : '' }}" href="/admin-area">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                      <i class="material-icons opacity-10">dashboard</i>
                  </div>
                  <span class="nav-link-text ms-1">Dashboard</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link text-white {{ ($title === "Akun") ? 'active' : '' }}" href="/admin-area/account">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                      <i class="material-icons opacity-10">manage_accounts</i>
                  </div>
                  <span class="nav-link-text ms-1">Data Akun</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link text-white {{ ($title === "Menu") ? 'active' : '' }}" href="/admin-area/menu">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                      <i class="material-icons opacity-10">menu_book</i>
                  </div>
                  <span class="nav-link-text ms-1">Data Menu</span>
              </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " {{ ($title === "Orders") ? 'active' : '' }} href="/admin-area/orders">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">list_alt</i>
                </div>
                <span class="nav-link-text ms-1">Orders</span>
            </a>
        </li>
          <li class="nav-item">
              <a class="nav-link text-white {{ ($title === "Transactions") ? 'active' : '' }}" href="/admin-area/transactions">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                      <i class="material-icons opacity-10">point_of_sale</i>
                  </div>
                  <span class="nav-link-text ms-1">Transactions</span>
              </a>
          </li>
          <li class="nav-item mt-3">
              <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account Actions</h6>
          </li>
          <li class="nav-item">
              <a class="nav-link text-white " href="./pages/profile.html">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                      <i class="material-icons opacity-10">logout</i>
                  </div>
                  <span class="nav-link-text ms-1">Log Out</span>
              </a>
          </li>
      </ul>
  </div>
</aside>