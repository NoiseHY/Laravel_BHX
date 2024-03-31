@extends('admin.users.layout')
@section('content')
<div class="container">
  <form>
    <h2>Chi tiết người dùng {{$users->HoTen}}</h2>
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
  </form>
</div>
@endsection