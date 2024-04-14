@extends('users.layout')

@section('content')

<div class="row">
  @foreach($products as $product)
  <div class="col-md-6 col-lg-6 col-xl-4 mb-4">
    <a href="{{ url('/details/' . $product->MaSP) }}" class="text-decoration-none text-dark">
      <div class="rounded position-relative fruite-item">
        <div class="fruite-img">
          <img src="{{ asset('uploads/' . $product->TenSP . '/' . $product->HinhAnh) }}" class="img-fluid w-100 rounded-top" alt="Hình ảnh sản phẩm">
        </div>
        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
          <h4 class="text-truncate">{{ $product->TenSP }}</h4>
          <p>{{ Str::limit($product->MoTa, 100) }}</p>
          <div class="d-flex justify-content-between flex-lg-wrap">
            <p class="text-dark fs-5 fw-bold mb-0">{{ $product->DonGia }} đ</p>
            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
          </div>
        </div>
      </div>
    </a>
  </div>
  @endforeach
</div>






<!-- <div class="col-12">
  <div class="pagination d-flex justify-content-center mt-5">
    <a href="#" class="rounded">&laquo;</a>
    <a href="#" class="active rounded">1</a>
    <a href="#" class="rounded">2</a>
    <a href="#" class="rounded">3</a>
    <a href="#" class="rounded">4</a>
    <a href="#" class="rounded">5</a>
    <a href="#" class="rounded">6</a>
    <a href="#" class="rounded">&raquo;</a>
  </div>
</div> -->
@endsection