@extends('admin.products.layout')
@section('content')
<div class="container">
  <form>
    <h2>Chi tiết sản phẩm {{$products->TenSP}}</h2>
    <ul class="list-group">
      <li class="list-group-item">Mã sản phẩm : {{$products->MaSP}}</li>
      <li class="list-group-item">Tên sản phẩm : {{$products->TenSP}}</li>
      <li class="list-group-item">Tên loại : {{$category->TenLoai}}</li>
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
      <li class="list-group-item">Khối lượng : {{$products_info->KhoiLuong}}</li>
      <li class="list-group-item">Đơn vị : {{$products_info->DonVi}}</li>
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
            @if(isset($products_info) && $products_info->HinhAnh)
            @foreach (json_decode($products_info->HinhAnh) as $image)
            <img src="{{ asset('uploads/' . $products->TenSP . '/' . $image) }}" class="img-thumbnail" alt="Hình ảnh sản phẩm" style="max-width: 200px; max-height: 200px;">
            @endforeach
            @else
            <!-- Hiển thị một thông báo hoặc hình ảnh mặc định nếu không có hình ảnh -->
            <p>Không có hình ảnh</p>
            @endif 

          </div>
        </div>
      </li>
      </br>

    </ul>
  </form>
</div>
@endsection