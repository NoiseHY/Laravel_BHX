@extends('users.profile.layout')

@section('content')

<div class="container">
  <h2>Thông tin người dùng </h2>

  <form action="{{url('profile/' .$users->MaNguoiDung)}}" method="post">

    {!! csrf_field() !!}
    @method("PATCH")
    <div class="form-group">
      <label for="exampleInputName">Tên đăng nhập</label>
      <input readonly type="text" class="form-control" id="TenDangNhap" name="TenDangNhap" value="{{$users->TenDangNhap}}">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail">Mật khẩu</label>
      <input type="password" class="form-control" id="MatKhau" name="MatKhau" value="{{$users->MatKhau}}">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword">Họ và tên</label>
      <input type="text" class="form-control" id="HoTen" name="HoTen" value="{{$users->HoTen}}">
    </div>
    <!-- type="email" -->
    <div class="form-group">
      <label for="exampleInputPassword">Email</label>
      <input type="text" class="form-control" id="Email" name="Email" value="{{$users->Email}}">
    </div>
    <br>
    @if (\Session::has('message'))
    <div class="alert alert-success">
      {{ \Session::get('message') }}
    </div>
    @endif
    <br>
    <button type="submit" value="Save" class="btn btn-primary">Sửa</button>

  </form>
</div>

@endsection