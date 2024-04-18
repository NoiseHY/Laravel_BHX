@extends('users.profile.layout')

@section('content')

<div class="container">
  <h2>Thông tin tài khoản </h2>
  @if (\Session::has('message'))
  <div class="alert alert-success">
    {{ \Session::get('message') }}
  </div>
  @endif
  <form action="{{url('profile/' .$user->MaNguoiDung)}}" method="post">

    {!! csrf_field() !!}
    @method("PATCH")
    <div class="form-group">
      <label for="exampleInputName">Tên đăng nhập</label>
      <input readonly type="text" class="form-control" id="TenDangNhap" name="TenDangNhap" value="{{$user->TenDangNhap}}">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail">Mật khẩu</label>
      <input type="password" class="form-control" id="MatKhau" name="MatKhau" value="{{$user->MatKhau}}">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword">Họ và tên</label>
      <input type="text" class="form-control" id="HoTen" name="HoTen" value="{{$user->HoTen}}">
    </div>
    <!-- type="email" -->
    <div class="form-group">
      <label for="exampleInputPassword">Email</label>
      <input type="text" class="form-control" id="Email" name="Email" value="{{$user->Email}}">
    </div>
    <br>

    <button type="submit" value="Save" class="btn btn-primary">Sửa</button>
    </br>

  </form>
</div>


@endsection