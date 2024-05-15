@extends('admin.cart.layout');

@section('content')

<div class="container">
  <form>
    <div class="product-details d-flex justify-content-between align-items-center">
      <h2>Thông tin chi tiết giỏ hàng <span style="color: red;">{{$cart->MaGioHang}}</span></h2>
      <a href="{{url('/users/'.$cart->MaNguoiDung)}}" type="button" class="btn btn-warning">
        <svg class="nav-icon" style="height : 30px; width : 20px">
          <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
        </svg>
      </a>
    </div>
    <ul class="list-group">
      <li class="list-group-item">Mã chi tiết giỏ hàng : {{$cart->MaGioHang}}</li>
      <li class="list-group-item">Mã giỏ hàng : {{$cart->MaNguoiDung}}</li>
      <li class="list-group-item">Mã sản phẩm : {{$cart->NgayThem}}</li>

    </ul>
    </br>

    <div class="product-details d-flex justify-content-between align-items-center">
      <h2>Thông tin chi tiết sản phẩm có trong giỏ hàng</h2>
    </div>

    <ul class="list-group">
      @foreach ($info as $info)
      <li class="list-group-item">Mã chi tiết giỏ hàng : {{$info->MaChiTietGioHang}}</li>
      <li class="list-group-item">Mã giỏ hàng : {{$info->MaGioHang}}</li>
      <li class="list-group-item">Mã sản phẩm : {{$info->MaSanPham}}</li>
      <li class="list-group-item">Số lượng : {{$info->SoLuong}}</li><br>
      @endforeach


    </ul>
    </br>

    </ul>

  </form>
</div>

@endsection