@extends('admin.customer.layout')

@section('content')

<div class="container">
  <form>
    <h2>Chi tiết khách hàng <span style="color : red">
        {{$cust->TenKH}}
      </span> </h2>
    <ul class="list-group">
      <li class="list-group-item">Mã chi tiết khách hàng: {{$cust->MaGioHang}}</li>
      <li class="list-group-item">{{$cust->MaKH}}</li>
      <li class="list-group-item">{{$cust->TenKH}}</li>
      <li class="list-group-item">{{$cust->DiaChi}}</li>
      <li class="list-group-item">{{$cust->DienThoai}}</li>
      <li class="list-group-item">{{$cust->Email}}</li>
      <li class="list-group-item">{{$cust->MaNguoiDung}}</li>

    </ul>
    </br>

    <div class="product-details d-flex justify-content-between align-items-center">
      <h2>Thông tin tài khoản</h2>
    </div>

    <ul class="list-group">

      <li class="list-group-item">Mã người dùng : {{$users->MaNguoiDung}}</li>
      <li class="list-group-item">Tên đăng nhập : {{$users->TenDangNhap}}</li>
      <li class="list-group-item">Mật khẩu : {{$users->MatKhau}}</li>
      <li class="list-group-item">Họ và tên : {{$users->HoTen}}</li>
      <li class="list-group-item">Email : {{$users->Email}}</li>
      <li class="list-group-item">Vai trò :
        @if($users->VaiTro == 1)
        Admin
        @elseif($users->VaiTro == 2)
        Khách hàng
        @else
        Vai trò không xác định
        @endif</li>
      <li class="list-group-item">
        Trạng thái:
        @if($users->TrangThai == 1)
        Đang sử dụng
        @elseif($users->TrangThai == 2)
        Đã hủy
        @else
        Trạng thái không xác định
        @endif
      </li>



    </ul>
    </br>

    </ul>

  </form>
</div>
@endsection