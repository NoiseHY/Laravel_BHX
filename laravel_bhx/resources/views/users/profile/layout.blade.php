<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Bách hóa xanh</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="/users_tmp/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <link href="/users_tmp/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


  <!-- Customized Bootstrap Stylesheet -->
  <link href="/users_tmp/css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="/users_tmp/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- Spinner Start -->
  <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
  </div>
  <!-- Spinner End -->



  <!-- Navbar start -->
  <div class="container-fluid fixed-top">

    <div class="container topbar bg-primary d-none d-lg-block">
      <div class="d-flex justify-content-between">
        <div class="top-info ps-2">
          <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">Hưng Yên</a></small>
          <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">congnamhy1@gmail.com</a></small>
        </div>

      </div>
    </div>
    <!-- start -->
    <div class="container px-0">
      <nav class="navbar navbar-light bg-white navbar-expand-xl">
        <a href="{{url('/home')}}" class="navbar-brand">
          <h1 class="text-primary display-6">Bách hóa xanh</h1>
        </a>
        <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
          <span class="fa fa-bars text-primary"></span>
        </button>
        <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
          <div class="navbar-nav mx-auto">
            <a href="shop.html" class="nav-item nav-link active">Trang chủ</a>
            <a href="shop-detail.html" class="nav-item nav-link">Danh mục</a>
            <a href="shop-detail.html" class="nav-item nav-link">Giúp đỡ</a>

          </div>

          <div class="d-flex align-items-center"> <button class="btn btn-light me-3 rounded-pill" data-bs-toggle="modal" data-bs-target="#searchModal">
              <i class="fas fa-search text-primary"></i>
            </button>
            <div class="dropdown">
              <a href="#" class="dropdown-toggle d-flex align-items-center text-dark" data-bs-toggle="dropdown">
                <i class="fas fa-user fa-lg"></i> </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a href="#" class="dropdown-item">Trang cá nhân</a></li>
                <li><a href="#" class="dropdown-item">Cài đặt</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a href="#" class="dropdown-item">Thoát</a></li>
              </ul>
            </div>
          </div>
          
        </div>
      </nav>
    </div>
    <!-- end -->
  </div>
  <!-- Navbar End -->


  <!-- Modal Search Start -->
  <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content rounded-0">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex align-items-center">
          <div class="input-group w-75 mx-auto d-flex">
            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Search End -->


  <!-- Single Page Header start -->
  <div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Bách hóa xanh</h1>
    <ol class="breadcrumb justify-content-center mb-0">
      <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
      <li class="breadcrumb-item active text-white">Trang cá nhân</li>
    </ol>
  </div>
  <!-- Single Page Header End -->


  <!-- Fruits Shop Start-->
  <div class="container-fluid fruite py-5">
    @yield('content')
  </div>
  <!-- Fruits Shop End-->


  <!-- Footer Start -->
  <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
    <div class="container py-5">
      <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
        <div class="row g-4">
          <div class="col-lg-3">
            <a href="#">
              <h1 class="text-primary mb-0">Bách hóa xanh</h1>
              <p class="text-secondary mb-0">Fresh products</p>
            </a>
          </div>


        </div>
      </div>

      <!-- Footer End -->


      <!-- Copyright End -->



      <!-- Back to Top -->
      <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


      <!-- JavaScript Libraries -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
      <script src="/users_tmp/lib/easing/easing.min.js"></script>
      <script src="/users_tmp/lib/waypoints/waypoints.min.js"></script>
      <script src="/users_tmp/lib/lightbox/js/lightbox.min.js"></script>
      <script src="/users_tmp/lib/owlcarousel/owl.carousel.min.js"></script>

      <!-- Template Javascript -->
      <script src="/users_tmp/js/main.js"></script>
</body>

</html>