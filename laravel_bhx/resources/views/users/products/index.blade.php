@extends('users.products.layout')
@section('content')
<div class="container-fluid py-5 mt-5">
  <div class="container py-5">
    <div class="row g-4 mb-5">
      <div class="col-lg-8 col-xl-9">
        <div class="row g-4">
          <div class="col-lg-6">
            <div class="border rounded">
              <a href="#">
                <img src="{{asset('uploads/' . $products->TenSP . '/' . $products->HinhAnh)}}" class="img-fluid rounded" alt="Image">
              </a>
            </div>
          </div>

          <!-- category -->
          
          <div class="col-lg-6">
            <h4 class="fw-bold mb-3">{{$products->TenSP}}</h4>
            <p class="mb-3">Category: Vegetables</p>
            <h5 class="fw-bold mb-3">{{$products->DonGia}} đ</h5>
            <div class="d-flex mb-4">
              <i class="fa fa-star text-secondary"></i>
              <i class="fa fa-star text-secondary"></i>
              <i class="fa fa-star text-secondary"></i>
              <i class="fa fa-star text-secondary"></i>
              <i class="fa fa-star"></i>
            </div>
            <p class="mb-4">{{$products->MoTa}}</p>
            <!-- <p class="mb-4">Susp endisse ultricies nisi vel quam suscipit. Sabertooth peacock flounder; chain pickerel hatchetfish, pencilfish snailfish</p> -->
            <div class="input-group quantity mb-5" style="width: 100px;">
              <div class="input-group-btn">
                <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                  <i class="fa fa-minus"></i>
                </button>
              </div>
              <input type="text" class="form-control form-control-sm text-center border-0" value="1">
              <div class="input-group-btn">
                <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                  <i class="fa fa-plus"></i>
                </button>
              </div>
            </div>
            <a href="#" class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
          </div>
          
          <!-- end -->

          <div class="col-lg-12">
            <nav>
              <div class="nav nav-tabs mb-3">
                <button class="nav-link active border-white border-bottom-0" type="button" role="tab" id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about" aria-controls="nav-about" aria-selected="true">Description</button>
                <button class="nav-link border-white border-bottom-0" type="button" role="tab" id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission" aria-controls="nav-mission" aria-selected="false">Reviews</button>
              </div>
            </nav>
            <div class="tab-content mb-5">
              <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                <p>Thông tin khác : {{$details->ThongTinKhac}} </p>
                <!-- <p>Sabertooth peacock flounder; chain pickerel hatchetfish, pencilfish snailfish filefish Antarctic
                  icefish goldeye aholehole trumpetfish pilot fish airbreathing catfish, electric ray sweeper.</p> -->
                <div class="px-2">
                  <div class="row g-4">
                    <div class="col-6">
                      <div class="row bg-light align-items-center text-center justify-content-center py-2">
                        <div class="col-6">
                          <p class="mb-0">Thương hiệu </p>
                        </div>
                        <div class="col-6">
                          <p class="mb-0">{{$details->ThuongHieu}}</p>
                        </div>
                      </div>
                      <div class="row text-center align-items-center justify-content-center py-2">
                        <div class="col-6">
                          <p class="mb-0">Khối lượng</p>
                        </div>
                        <div class="col-6">
                          <p class="mb-0">{{$details->KhoiLuong}}</p>
                        </div>
                      </div>
                      
                      <div class="row text-center align-items-center justify-content-center py-2">
                        <div class="col-6">
                          <p class="mb-0">Thành phần</p>
                        </div>
                        <div class="col-6">
                          <p class="mb-0">{{$details->ThanhPhan}}</p>
                        </div>
                      </div>

                      <div class="row text-center align-items-center justify-content-center py-2">
                        <div class="col-6">
                          <p class="mb-0">Hướng dẫn sử dụng </p>
                        </div>
                        <div class="col-6">
                          <p class="mb-0">{{$details->HuongDanSuDung}}</p>
                        </div>
                      </div>

                      <div class="row text-center align-items-center justify-content-center py-2">
                        <div class="col-6">
                          <p class="mb-0">Hạn sử dụng </p>
                        </div>
                        <div class="col-6">
                          <p class="mb-0">{{$details->HanSuDung}}</p>
                        </div>
                      </div>

                      <div class="row text-center align-items-center justify-content-center py-2">
                        <div class="col-6">
                          <p class="mb-0">Bảo quản </p>
                        </div>
                        <div class="col-6">
                          <p class="mb-0">{{$details->BaoQuan}}</p>
                        </div>
                      </div>

                      <div class="row text-center align-items-center justify-content-center py-2">
                        <div class="col-6">
                          <p class="mb-0">Sản xuất tại </p>
                        </div>
                        <div class="col-6">
                          <p class="mb-0">{{$details->SanXuatTai}}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end -->
              </div>
              <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                <div class="d-flex">
                  <img src="/users_tmp/img/avatar.jpg" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="">
                  <div class="">
                    <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                    <div class="d-flex justify-content-between">
                      <h5>Jason Smith</h5>
                      <div class="d-flex mb-3">
                        <i class="fa fa-star text-secondary"></i>
                        <i class="fa fa-star text-secondary"></i>
                        <i class="fa fa-star text-secondary"></i>
                        <i class="fa fa-star text-secondary"></i>
                        <i class="fa fa-star"></i>
                      </div>
                    </div>
                    <p>The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic
                      words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                  </div>
                </div>
                <div class="d-flex">
                  <img src="/users_tmp/img/avatar.jpg" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="">
                  <div class="">
                    <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                    <div class="d-flex justify-content-between">
                      <h5>Sam Peters</h5>
                      <div class="d-flex mb-3">
                        <i class="fa fa-star text-secondary"></i>
                        <i class="fa fa-star text-secondary"></i>
                        <i class="fa fa-star text-secondary"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                      </div>
                    </div>
                    <p class="text-dark">The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic
                      words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="nav-vision" role="tabpanel">
                <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam
                  amet diam et eos labore. 3</p>
                <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.
                  Clita erat ipsum et lorem et sit</p>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      <div class="col-lg-4 col-xl-3">
        <div class="row g-4 fruite">
          <div class="col-lg-12">
            <div class="input-group w-100 mx-auto d-flex mb-4">
              <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
              <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
            </div>
            <div class="mb-4">
              <h4>Categories</h4>
              <ul class="list-unstyled fruite-categorie">
                <li>
                  <div class="d-flex justify-content-between fruite-name">
                    <a href="#"><i class="fas fa-apple-alt me-2"></i>Apples</a>
                    <span>(3)</span>
                  </div>
                </li>
                <li>
                  <div class="d-flex justify-content-between fruite-name">
                    <a href="#"><i class="fas fa-apple-alt me-2"></i>Oranges</a>
                    <span>(5)</span>
                  </div>
                </li>
                <li>
                  <div class="d-flex justify-content-between fruite-name">
                    <a href="#"><i class="fas fa-apple-alt me-2"></i>Strawbery</a>
                    <span>(2)</span>
                  </div>
                </li>
                <li>
                  <div class="d-flex justify-content-between fruite-name">
                    <a href="#"><i class="fas fa-apple-alt me-2"></i>Banana</a>
                    <span>(8)</span>
                  </div>
                </li>
                <li>
                  <div class="d-flex justify-content-between fruite-name">
                    <a href="#"><i class="fas fa-apple-alt me-2"></i>Pumpkin</a>
                    <span>(5)</span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          
          <div class="col-lg-12">
            <h4 class="mb-4">Featured products</h4>
            <div class="d-flex align-items-center justify-content-start">
              <div class="rounded" style="width: 100px; height: 100px;">
                <img src="/users_tmp/img/featur-1.jpg" class="img-fluid rounded" alt="Image">
              </div>
              <div>
                <h6 class="mb-2">Big Banana</h6>
                <div class="d-flex mb-2">
                  <i class="fa fa-star text-secondary"></i>
                  <i class="fa fa-star text-secondary"></i>
                  <i class="fa fa-star text-secondary"></i>
                  <i class="fa fa-star text-secondary"></i>
                  <i class="fa fa-star"></i>
                </div>
                <div class="d-flex mb-2">
                  <h5 class="fw-bold me-2">2.99 $</h5>
                  <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                </div>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-start">
              <div class="rounded" style="width: 100px; height: 100px;">
                <img src="/users_tmp/img/featur-2.jpg" class="img-fluid rounded" alt="">
              </div>
              <div>
                <h6 class="mb-2">Big Banana</h6>
                <div class="d-flex mb-2">
                  <i class="fa fa-star text-secondary"></i>
                  <i class="fa fa-star text-secondary"></i>
                  <i class="fa fa-star text-secondary"></i>
                  <i class="fa fa-star text-secondary"></i>
                  <i class="fa fa-star"></i>
                </div>
                <div class="d-flex mb-2">
                  <h5 class="fw-bold me-2">2.99 $</h5>
                  <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                </div>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-start">
              <div class="rounded" style="width: 100px; height: 100px;">
                <img src="/users_tmp/img/featur-3.jpg" class="img-fluid rounded" alt="">
              </div>
              <div>
                <h6 class="mb-2">Big Banana</h6>
                <div class="d-flex mb-2">
                  <i class="fa fa-star text-secondary"></i>
                  <i class="fa fa-star text-secondary"></i>
                  <i class="fa fa-star text-secondary"></i>
                  <i class="fa fa-star text-secondary"></i>
                  <i class="fa fa-star"></i>
                </div>
                <div class="d-flex mb-2">
                  <h5 class="fw-bold me-2">2.99 $</h5>
                  <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                </div>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-start">
              <div class="rounded me-4" style="width: 100px; height: 100px;">
                <img src="/users_tmp/img/vegetable-item-4.jpg" class="img-fluid rounded" alt="">
              </div>
              <div>
                <h6 class="mb-2">Big Banana</h6>
                <div class="d-flex mb-2">
                  <i class="fa fa-star text-secondary"></i>
                  <i class="fa fa-star text-secondary"></i>
                  <i class="fa fa-star text-secondary"></i>
                  <i class="fa fa-star text-secondary"></i>
                  <i class="fa fa-star"></i>
                </div>
                <div class="d-flex mb-2">
                  <h5 class="fw-bold me-2">2.99 $</h5>
                  <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                </div>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-start">
              <div class="rounded me-4" style="width: 100px; height: 100px;">
                <img src="/users_tmp/img/vegetable-item-5.jpg" class="img-fluid rounded" alt="">
              </div>
              <div>
                <h6 class="mb-2">Big Banana</h6>
                <div class="d-flex mb-2">
                  <i class="fa fa-star text-secondary"></i>
                  <i class="fa fa-star text-secondary"></i>
                  <i class="fa fa-star text-secondary"></i>
                  <i class="fa fa-star text-secondary"></i>
                  <i class="fa fa-star"></i>
                </div>
                <div class="d-flex mb-2">
                  <h5 class="fw-bold me-2">2.99 $</h5>
                  <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                </div>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-start">
              <div class="rounded me-4" style="width: 100px; height: 100px;">
                <img src="/users_tmp/img/vegetable-item-6.jpg" class="img-fluid rounded" alt="">
              </div>
              <div>
                <h6 class="mb-2">Big Banana</h6>
                <div class="d-flex mb-2">
                  <i class="fa fa-star text-secondary"></i>
                  <i class="fa fa-star text-secondary"></i>
                  <i class="fa fa-star text-secondary"></i>
                  <i class="fa fa-star text-secondary"></i>
                  <i class="fa fa-star"></i>
                </div>
                <div class="d-flex mb-2">
                  <h5 class="fw-bold me-2">2.99 $</h5>
                  <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                </div>
              </div>
            </div>
            <div class="d-flex justify-content-center my-4">
              <a href="#" class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Vew More</a>
            </div>
          </div>

          <!-- <div class="col-lg-12">
            <div class="position-relative">
              <img src="/users_tmp/img/banner-fruits.jpg" class="img-fluid w-100 rounded" alt="">
              <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
              </div>
            </div>
          </div> -->

        </div>
      </div>
    </div>
    <h1 class="fw-bold mb-0">Related products</h1>
    <div class="vesitable">
      <div class="owl-carousel vegetable-carousel justify-content-center">
        <div class="border border-primary rounded position-relative vesitable-item">
          <div class="vesitable-img">
            <img src="/users_tmp/img/vegetable-item-6.jpg" class="img-fluid w-100 rounded-top" alt="">
          </div>
          <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
          <div class="p-4 pb-0 rounded-bottom">
            <h4>Parsely</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
            <div class="d-flex justify-content-between flex-lg-wrap">
              <p class="text-dark fs-5 fw-bold">$4.99 / kg</p>
              <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
            </div>
          </div>
        </div>
        <div class="border border-primary rounded position-relative vesitable-item">
          <div class="vesitable-img">
            <img src="/users_tmp/img/vegetable-item-1.jpg" class="img-fluid w-100 rounded-top" alt="">
          </div>
          <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
          <div class="p-4 pb-0 rounded-bottom">
            <h4>Parsely</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
            <div class="d-flex justify-content-between flex-lg-wrap">
              <p class="text-dark fs-5 fw-bold">$4.99 / kg</p>
              <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
            </div>
          </div>
        </div>
        <div class="border border-primary rounded position-relative vesitable-item">
          <div class="vesitable-img">
            <img src="img/vegetable-item-3.png" class="img-fluid w-100 rounded-top bg-light" alt="">
            
          </div>
          <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
          <div class="p-4 pb-0 rounded-bottom">
            <h4>Banana</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
            <div class="d-flex justify-content-between flex-lg-wrap">
              <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
              <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
            </div>
          </div>
        </div>
        <div class="border border-primary rounded position-relative vesitable-item">
          <div class="vesitable-img">
            <img src="/users_tmp/img/vegetable-item-4.jpg" class="img-fluid w-100 rounded-top" alt="">
          </div>
          <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
          <div class="p-4 pb-0 rounded-bottom">
            <h4>Bell Papper</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
            <div class="d-flex justify-content-between flex-lg-wrap">
              <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
              <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
            </div>
          </div>
        </div>
        <div class="border border-primary rounded position-relative vesitable-item">
          <div class="vesitable-img">
            <img src="/users_tmp/img/vegetable-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
          </div>
          <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
          <div class="p-4 pb-0 rounded-bottom">
            <h4>Potatoes</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
            <div class="d-flex justify-content-between flex-lg-wrap">
              <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
              <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
            </div>
          </div>
        </div>
        <div class="border border-primary rounded position-relative vesitable-item">
          <div class="vesitable-img">
            <img src="/users_tmp/img/vegetable-item-6.jpg" class="img-fluid w-100 rounded-top" alt="">
          </div>
          <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
          <div class="p-4 pb-0 rounded-bottom">
            <h4>Parsely</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
            <div class="d-flex justify-content-between flex-lg-wrap">
              <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
              <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
            </div>
          </div>
        </div>
        <div class="border border-primary rounded position-relative vesitable-item">
          <div class="vesitable-img">
            <img src="/users_tmp/img/vegetable-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
          </div>
          <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
          <div class="p-4 pb-0 rounded-bottom">
            <h4>Potatoes</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
            <div class="d-flex justify-content-between flex-lg-wrap">
              <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
              <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
            </div>
          </div>
        </div>
        <div class="border border-primary rounded position-relative vesitable-item">
          <div class="vesitable-img">
            <img src="/users_tmp/img/vegetable-item-6.jpg" class="img-fluid w-100 rounded-top" alt="">
          </div>
          <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
          <div class="p-4 pb-0 rounded-bottom">
            <h4>Parsely</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
            <div class="d-flex justify-content-between flex-lg-wrap">
              <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
              <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




@endsection