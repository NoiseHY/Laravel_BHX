@extends('admin.users.layout')
@section('content')
<div class="container">

  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <h2>Cập nhật chi tiết người dùng <span style="color: red;">{{$users->HoTen}}</span></h2>

  <form action="{{url('users/' .$users->MaNguoiDung)}}" method="post">

    {!! csrf_field() !!}
    @method("PATCH")
    <div class="form-group">
      <label for="exampleInputName">Tên đăng nhập</label>
      <input type="text" class="form-control" id="TenDangNhap" name="TenDangNhap" value="{{$users->TenDangNhap}}">
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
    <button type="submit" value="Save" class="btn btn-warning">Sửa</button>
  </form>
</div>
@endsection