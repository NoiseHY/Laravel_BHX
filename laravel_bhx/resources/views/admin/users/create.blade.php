@extends('admin.users.layout')
@section('content')
<div class="container">
  @if (\Session::has('message'))
  <div class="alert alert-success">
    {{ \Session::get('message') }}
  </div>
  @endif
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

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

    <div class="form-group">
      <label for="exampleTextarea">Email</label>
      <input class="form-control" type="email" id="Email" name="Email" rows="3" placeholder="Email"></input>
    </div>
    <br>
    <button type="submit" value="Save" class="btn btn-primary">
      <svg class="nav-icon" style="height : 30px; width : 20px">
        <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-check-alt"></use>
      </svg>
      Thêm</button>
  </form>
</div>

@endsection