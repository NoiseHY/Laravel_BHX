@extends('users.customer.layout')

@section('content')

<div class="container">
  <h2>Thông tin người dùng </h2>

  @if (\Session::has('message'))
    <div class="alert alert-success">
      {{ \Session::get('message') }}
    </div>
    @endif

  <form action="{{url('/customer/' .$customer->MaNguoiDung)}}" method="post">

    {!! csrf_field() !!}
    @method("PATCH")
    <div class="form-group">
      <label for="exampleInputName">Tên khách hàng</label>
      <input type="text" class="form-control" id="TenKH" name="TenKH" value="{{$customer->TenKH}}">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail">Địa chỉ</label>
      <input type="text" class="form-control" id="DiaChi" name="DiaChi" value="{{$customer->DiaChi}}">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword">Số điện thoại</label>
      <input type="text" class="form-control" id="DienThoai" name="DienThoai" value="{{$customer->DienThoai}}">
    </div>
    <!-- type="email" -->
    <div class="form-group">
      <label for="exampleInputPassword">Email</label>
      <input type="text" class="form-control" id="Email" name="Email" value="{{$customer->Email}}">
    </div>
    <br>

    <button type="submit" value="Save" class="btn btn-primary">Sửa</button>

  </form>
</div>
@endsection