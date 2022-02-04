<!--
=========================================================
* Material Dashboard 2 - v3.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/admin/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('/admin/assets/img/favicon.png') }}">
    <title>
        Brainy Cafe | {{ $title }}
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('/admin/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('/admin/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('/admin/assets/css/material-dashboard.css?v=3.0.0') }}" rel="stylesheet" />
</head>

<body class="">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <nav
                    class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid ps-2 pe-0">
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="/">
                            Brainy Cafe | {{ $title }}
                        </a>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center"
                                style="background-image: url('{{ asset('/admin/assets/img/illustrations/bg_register.jpg') }}'); background-size: cover;">
                            </div>
                        </div>
                        <form action="/signup/submit" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div
                                class="col-xl-5 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                                <div class="card card-plain">
                                    <div class="card-header">
                                        <h4 class="font-weight-bolder">Sign Up</h4>
                                        <p class="mb-0">Enter your email and password to register</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                              <div class="input-group input-group-outline mb-3">
                                                <label class="form-label">Nama Pengguna</label>
                                                <input type="text" class="form-control" name="name_account" required>
                                              </div>
                                            </div>
                                            <div class="col-lg-6">
                                              <div class="input-group input-group-outline mb-3">
                                                <label class="form-label">No Telepon</label>
                                                <input type="number" class="form-control" name="no_telp" required>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-lg-12">
                                            <div class="input-group input-group-outline mb-3">
                                              <label class="form-label">Username</label>
                                              <input type="text" class="form-control" name="username" required>
                                              @if ($msg != null)
                                              <label for="" class="input-group mt-2" style="margin-bottom: -10px; font-weight: bold;"><i class="fas fa-exclamation-triangle" style="margin-right: 5px" oninput="checkUsername()"> </i>Username Telah Digunakan!</label>
                                              @endif
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-lg-6">
                                            <div class="input-group input-group-outline mb-3">
                                              <label class="form-label">Password</label>
                                              <input type="password" class="form-control" name="password1" id="pw1"
                                                  oninput="checkpasswd()" required>
                                            </div>
                                          </div>
                                          <div class="col-lg-6">
                                            <div class="input-group input-group-outline mb-3">
                                              <label class="form-label">Retype Password</label>
                                              <input type="password" class="form-control" name="password2" id="pw2"
                                                  oninput="checkpasswd()" required>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="text-center">
                                          <button type="submit" id="signup"
                                              class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign
                                              Up</button>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                        <p class="mb-2 text-sm mx-auto">
                                            Already have an account?
                                            <a href="/login" class="text-primary text-gradient font-weight-bold">Sign
                                                in</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--   Core JS Files   -->
    <script src="{{ asset('/admin/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('/admin/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/admin/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/admin/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

        function checkpasswd() {
            var pass1 = document.getElementById('pw1').value;
            var pass2 = document.getElementById('pw2').value;

            if (pass1 == pass2) {
                document.getElementById('signup').disabled = false;
            } else {
                document.getElementById('signup').disabled = true;
            }
        }

        window.addEventListener('load', function () {
            document.getElementById('signup').disabled = true;
        });
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('/admin/assets/js/material-dashboard.min.js?v=3.0.0') }}"></script>
</body>

</html>