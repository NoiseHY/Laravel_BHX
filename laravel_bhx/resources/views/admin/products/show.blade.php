@extends('admin.products.layout')
@section('content')
<div class="container">
  <form>
    <h2>Chi tiết sản phẩm {{$products->TenSP}}</h2>
    <ul class="list-group">
      <li class="list-group-item">Mã sản phẩm : {{$products->TenSP}}</li>
      <li class="list-group-item">Tên loại : </li>
      <li class="list-group-item">Đơn giá : {{$products->DonGia}}</li>
      <li class="list-group-item">Số lượng : {{$products->SoLuong}}</li>
      <li class="list-group-item">Mô tả : {{$products->MoTa}}</li>
      <li class="list-group-item">
        <div class="row">
          <div class="col-2">
            <span class="font-weight-bold">Hình ảnh:</span>
          </div>
          <div class="col-10">
            <img src="{{ asset('uploads/' . $products->TenSP . '/' . $products->HinhAnh) }}" class="img-thumbnail" alt="Hình ảnh sản phẩm" style="max-width: 200px; max-height: 200px;">
          </div>
        </div>
      </li>


    </ul>
  </form>
</div>
@endsection