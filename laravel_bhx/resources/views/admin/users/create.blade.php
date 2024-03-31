@extends('admin.users.layout')
@section('content')
<div class="container">
  <h2>Thêm người dùng</h2>
  <form action="{{url('users')}}" method="post">

    {!! csrf_field() !!}
    <div class="form-group">
      <label for="exampleInputName">Tên đăng nhập</label>
      <input type="text" class="form-control" id="TenDangNhap" name="TenDangNhap" placeholder="Nhập tên đăng nhập">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail">Mật khẩu</label>
      <input type="password" class="form-control" id="MatKhau" name="MatKhau" placeholder="Mật khẩu">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword">Họ và tên</label>
      <input type="text" class="form-control" id="HoTen" name="HoTen" placeholder="Họ và tên">
    </div>
    <!-- type="email" -->
    <div class="form-group">
      <label for="exampleTextarea">Email</label>
      <textarea class="form-control" id="Email" name="Email" rows="3" placeholder="Email"></textarea>
    </div>
    <br>
    <button type="submit" value="Save" class="btn btn-primary">Submit</button>
  </form>
</div>

@endsection