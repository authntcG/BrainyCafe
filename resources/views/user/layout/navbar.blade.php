    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="/">
                                <img src="{{ asset('/user/assets/img/logo.png') }}" alt="">
                            </a>
                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="/shop">Shop</a></li>
                                @if (Session::get('id') != null)
                                <li><a>Acccount</a>
                                    <ul class="sub-menu">
                                        <li><a href="/cart">Cart</a></li>
                                        <li><a href="/history/{{ Session::get('id') }}">Transaction History</a></li>
                                    </ul>
                                </li>
                                @endif
                                <li><a href="/about">About</a></li>
                                <li>
                                    <div class="header-icons">
                                        @if ((Session::get('id') != null || Session::get('level') != null))
                                            @if (decrypt(Session::get('level')) == 1)
                                            <a class="btn btn-sm boxed-btn" href="/admin-area">You're Admin</a>
                                            @else
                                            <a class="shopping-cart" href="/cart"><i class="fas fa-shopping-cart"></i></a>
                                            <a class="btn btn-sm boxed-btn login" href="/logout"></a>
                                            @endif
                                        @else
                                        <a class="btn btn-sm boxed-btn" href="/login">Login</a>
                                        @endif
                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <a class="mobile-show search-bar-icon" href="/cart"><i class="fas fa-shopping-cart"></i></a>
                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->