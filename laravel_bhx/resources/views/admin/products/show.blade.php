@extends('admin.products.layout')
@section('content')
<div class="container">
  <form>
    <h2>Chi tiết sản phẩm {{$products->TenSP}}</h2>
    <ul class="list-group">
      <li class="list-group-item">Mã sản phẩm : {{$products->MaSP}}</li>
      <li class="list-group-item">Tên sản phẩm : {{$products->TenSP}}</li>
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
    </br>

    <div class="product-details d-flex justify-content-between align-items-center">
      <h2>Thông tin Chi Tiết sản phẩm {{$products->TenSP}}</h2>
      <a href="{{url('/info/'.$products->MaSP)}}" type="button" class="btn btn-warning">Sửa</a>
    </div>


    <ul class="list-group">
      
      <li class="list-group-item">Thương hiệu : {{$products_info->ThuongHieu}}</li>
      <li class="list-group-item">Đơn giá : {{$products_info->KhoiLuong}}</li>
      <li class="list-group-item">Thành phẩn : {{$products_info->ThanhPhan}}</li>
      <li class="list-group-item">Hướng dẫn sử dùng : {{$products_info->HuongDanSuDung}}</li>
      <li class="list-group-item">Hạn sử dụng : {{$products_info->HanSuDung}}</li>
      <li class="list-group-item">Bảo quản : {{$products_info->BaoQuan}}</li>
      <li class="list-group-item">Sản xuất tại : {{$products_info->SanXuatTai}}</li>

      <li class="list-group-item">
        <div class="row">
          <div class="col-2">
            <span class="font-weight-bold">Hình ảnh:</span>
          </div>
          <div class="col-10">
            <img src="{{ asset('uploads/' . $products->TenSP . '/' . $products_info->HinhAnh) }}" class="img-thumbnail" alt="Hình ảnh sản phẩm" style="max-width: 200px; max-height: 200px;">
          </div>
        </div>
      </li>


    </ul>
  </form>
</div>
@endsection