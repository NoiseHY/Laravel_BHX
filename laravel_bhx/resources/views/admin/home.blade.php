<!DOCTYPE html><!--
* CoreUI - Free Bootstrap Admin Template
* @version v5.0.0
* @link https://coreui.io/product/free-bootstrap-admin-template/
* Copyright (c) 2024 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://github.com/coreui/coreui-free-bootstrap-admin-template/blob/main/LICENSE)
-->
<html lang="en">

<head>
  <base href="./">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
  <meta name="author" content="Łukasz Holeczek">
  <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
  <title>Admin - Bách hóa xanh</title>
  <link rel="apple-touch-icon" sizes="57x57" href="/assets/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/assets/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/assets/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/assets/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/assets/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/assets/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/assets/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="/assets/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/assets/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="/assets/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/assets/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <!-- Vendors styles-->
  <link rel="stylesheet" href="/vendors/simplebar/css/simplebar.css">
  <link rel="stylesheet" href="/css/vendors/simplebar.css">
  <!-- Main styles for this application-->
  <link href="/css/style.css" rel="stylesheet">
  <!-- We use those styles to show code examples, you should remove them in your application.-->
  <link href="/css/examples.css" rel="stylesheet">
  <!-- We use those styles to style Carbon ads and CoreUI PRO banner, you should remove them in your application.-->
  <link href="/css/ads.css" rel="stylesheet">
  <script src="/js/config.js"></script>
  <script src="/js/color-modes.js"></script>
  <link href="/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
</head>

<body>
  <div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
    <div class="sidebar-header border-bottom">
      <div class="sidebar-brand">
        <svg class="sidebar-brand-full" width="88" height="32" alt="CoreUI Logo">
          <use xlink:href="/assets/brand/coreui.svg#full"></use>
        </svg>
        <svg class="sidebar-brand-narrow" width="32" height="32" alt="CoreUI Logo">
          <use xlink:href="/assets/brand/coreui.svg#signet"></use>
        </svg>
      </div>
      <button class="btn-close d-lg-none" type="button" data-coreui-dismiss="offcanvas" data-coreui-theme="dark" aria-label="Close" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()"></button>
    </div>

    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
      <li class="nav-item"><a class="nav-link" href="{{url('/admin')}}">
          <svg class="nav-icon">
            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
          </svg> Trang chủ</a></li>
      <li class="nav-title">Tác vụ</li>

      <!-- Người dùng -->
      <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
          <svg class="nav-icon">
            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
          </svg> Người dùng</a>
        <ul class="nav-group-items compact">
          <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Danh sách người dùng</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('users.create') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Thêm người dùng</a></li>
        </ul>
      </li>


      <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
          <svg class="nav-icon">
            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-cursor"></use>
          </svg> Sản phẩm</a>
        <ul class="nav-group-items compact">
          <li class="nav-item"><a class="nav-link" href="{{route('products.index')}}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Danh sách sản phẩm</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('products.create')}}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Thêm sản phẩm</a></li>
        </ul>
      </li>

      <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
          <svg class="nav-icon">
            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-cursor"></use>
          </svg> Loại sản phẩm</a>
        <ul class="nav-group-items compact">
          <li class="nav-item"><a class="nav-link" href="{{route('categories.index')}}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Danh sách loại sản phẩm</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('products.create')}}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Thêm loại sản phẩm</a></li>
        </ul>
      </li>

      <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
          <svg class="nav-icon">
            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-cursor"></use>
          </svg> Hóa đơn</a>
        <ul class="nav-group-items compact">
          <li class="nav-item"><a class="nav-link" href="{{url('/adminPay')}}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Danh sách hóa đơn</a></li>
        </ul>
      </li>


      <div class="sidebar-footer border-top d-none d-md-flex">
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
      </div>
    </ul>

  </div>
  <div class="wrapper d-flex flex-column min-vh-100">
    <header class="header header-sticky p-0 mb-4">
      <div class="container-fluid border-bottom px-4">
        <button class="header-toggler" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()" style="margin-inline-start: -14px;">
          <svg class="icon icon-lg">
            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
          </svg>
        </button>
        <ul class="header-nav d-none d-lg-flex">
          <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Users</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
        </ul>
        <ul class="header-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#">
              <svg class="icon icon-lg">
                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
              </svg></a></li>
          <li class="nav-item"><a class="nav-link" href="#">
              <svg class="icon icon-lg">
                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-list-rich"></use>
              </svg></a></li>
          <li class="nav-item"><a class="nav-link" href="#">
              <svg class="icon icon-lg">
                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
              </svg></a></li>
        </ul>

        <ul class="header-nav">
          <li class="nav-item py-1">
            <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
          </li>
          <li class="nav-item dropdown">
            <button class="btn btn-link nav-link py-2 px-2 d-flex align-items-center" type="button" aria-expanded="false" data-coreui-toggle="dropdown">
              <svg class="icon icon-lg theme-icon-active">
                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-contrast"></use>
              </svg>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" style="--cui-dropdown-min-width: 8rem;">
              <li>
                <button class="dropdown-item d-flex align-items-center" type="button" data-coreui-theme-value="light">
                  <svg class="icon icon-lg me-3">
                    <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-sun"></use>
                  </svg>Light
                </button>
              </li>
              <li>
                <button class="dropdown-item d-flex align-items-center" type="button" data-coreui-theme-value="dark">
                  <svg class="icon icon-lg me-3">
                    <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-moon"></use>
                  </svg>Dark
                </button>
              </li>
              <li>
                <button class="dropdown-item d-flex align-items-center active" type="button" data-coreui-theme-value="auto">
                  <svg class="icon icon-lg me-3">
                    <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-contrast"></use>
                  </svg>Auto
                </button>
              </li>
            </ul>
          </li>
          <li class="nav-item py-1">
            <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
          </li>
          <li class="nav-item dropdown"><a class="nav-link py-0 pe-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <div class="avatar avatar-md"><img class="avatar-img" src="/assets/img/avatars/8.jpg" alt="user@email.com"></div>
            </a>

            <div class="dropdown-menu dropdown-menu-end pt-0">

              <div class="dropdown-divider"></div><a class="dropdown-item" href="#">
                <a class="dropdown-item" href="#">
                  <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="dropdown-item">
                      <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                      Thoát
                    </button>
                  </form>
                </a>
            </div>
          </li>
        </ul>
        
      </div>
      <div class="container-fluid px-4">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb my-0">
            <li class="breadcrumb-item"><a href="#">Home</a>
            </li>
            <li class="breadcrumb-item active"><span>Dashboard</span>
            </li>
          </ol>
        </nav>
      </div>
    </header>

    <!-- body flex-grow-1 -->

    <div class="body flex-grow-1">
      <div class="container-lg px-4">
        <div class="row mb-4">
          <div class="col-xl-5 col-xxl-4 mb-4 mb-xl-0">
            <script id="_carbonads_js" async="" type="text/javascript" src="//cdn.carbonads.com/carbon.js?serve=CEAICKJY&amp;placement=coreuiio"></script>
          </div>

        </div>
        <div class="row g-4 mb-4">

          <div class="col-sm-6 col-xl-3">
            <div class="card text-white bg-primary">
              <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                <div>
                  <div class="fs-4 fw-semibold">26K <span class="fs-6 fw-normal">(-12.4%
                      <svg class="icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
                      </svg>)</span></div>
                  <div>Sản phẩm</div>
                </div>
                <div class="dropdown">
                  <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg class="icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                    </svg>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                </div>
              </div>
              <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                <canvas class="chart" id="card-chart1" height="70"></canvas>
              </div>
            </div>
          </div>

          <!-- /.col-->
          <div class="col-sm-6 col-xl-3">
            <div class="card text-white bg-info">
              <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                <div>
                  <div class="fs-4 fw-semibold">$6.200 <span class="fs-6 fw-normal">(40.9%
                      <svg class="icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-top"></use>
                      </svg>)</span></div>
                  <div>Người dùng</div>
                </div>
                <div class="dropdown">
                  <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg class="icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                    </svg>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                </div>
              </div>
              <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                <canvas class="chart" id="card-chart2" height="70"></canvas>
              </div>
            </div>
          </div>
          <!-- /.col-->
          <div class="col-sm-6 col-xl-3">
            <div class="card text-white bg-warning">
              <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                <div>
                  <div class="fs-4 fw-semibold">2.49% <span class="fs-6 fw-normal">(84.7%
                      <svg class="icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-top"></use>
                      </svg>)</span></div>
                  <div>Hóa đơn</div>
                </div>
                <div class="dropdown">
                  <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg class="icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                    </svg>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                </div>
              </div>
              <div class="c-chart-wrapper mt-3" style="height:70px;">
                <canvas class="chart" id="card-chart3" height="70"></canvas>
              </div>
            </div>
          </div>
          <!-- /.col-->
          <div class="col-sm-6 col-xl-3">
            <div class="card text-white bg-danger">
              <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                <div>
                  <div class="fs-4 fw-semibold">44K <span class="fs-6 fw-normal">(-23.6%
                      <svg class="icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
                      </svg>)</span></div>
                  <div>Tổng tiền</div>
                </div>
                <div class="dropdown">
                  <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg class="icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                    </svg>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                </div>
              </div>
              <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                <canvas class="chart" id="card-chart4" height="70"></canvas>
              </div>
            </div>
          </div>
          <!-- /.col-->
        </div>
        
      </div>
    </div>

    <!-- end body flex-grow-1 -->



  </div>
  <!-- CoreUI and necessary plugins-->
  <script src="/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
  <script src="/vendors/simplebar/js/simplebar.min.js"></script>
  <script>
    const header = document.querySelector('header.header');

    document.addEventListener('scroll', () => {
      if (header) {
        header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
      }
    });
  </script>
  <!-- Plugins and scripts required by this view-->
  <script src="/vendors/chart.js/js/chart.umd.js"></script>
  <script src="/vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
  <script src="/vendors/@coreui/utils/js/index.js"></script>
  <script src="/js/main.js"></script>
  <script>
  </script>

</body>

</html>