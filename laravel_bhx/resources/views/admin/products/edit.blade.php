@extends('admin.products.layout')
@section('content')
<div class="container">
  <h2>Cập nhật sản phẩm {{$products->TenSP}}</h2>
  <form action="{{url('products/' .$products->MaSP)}}" method="post">

    {!! csrf_field() !!}
    @method("PATCH")
    <div class="form-group">
      <label for="exampleInputName">Tên sản phẩm</label>
      <input type="text" class="form-control" id="TenSP" name="TenSP" value="{{$products->TenSP}}">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail">Đơn giá</label>
      <input type="password" class="form-control" id="DonGia" name="DonGia" value="{{$products->DonGia}}">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword">Số lượng</label>
      <input type="text" class="form-control" id="SoLuong" name="SoLuong" value="{{$products->SoLuong}}">
    </div>

    <div class="form-group">
      <label for="exampleInputPassword">Mô tả</label>
      <textarea class="form-control" id="MoTa" style="height: 150px;" name="MoTa">{{$products->MoTa}}</textarea>
    </div>
    <br>

    <div class="row">
      <div class="col-2">
        <span class="font-weight-bold">Hình ảnh:</span>
      </div>
      <div class="col-10">
        <img src="{{ asset('uploads/' . $products->TenSP . '/' . $products->HinhAnh) }}" class="img-thumbnail" alt="Hình ảnh sản phẩm" style="max-width: 200px; max-height: 200px;">
      </div>
    </div>

    <div class="form-group">
      <label for="exampleInputImage">Hình ảnh</label>
      <div class="input-group">
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="HinhAnh" name="HinhAnh" aria-describedby="imageHelp" >
          <label class="custom-file-label" for="exampleInputImage">Chọn hình ảnh</label>
        </div>
      </div>
      <small id="imageHelp" class="form-text text-muted">Chọn một hình ảnh từ thiết bị của bạn.</small>
    </div>
    <br>
    
    <button type="submit" value="Save" class="btn btn-primary">Sửa</button>
  </form>
</div>

@endsection