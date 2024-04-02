@extends('admin.products.layout')
@section('content')
<div class="container">
  <h2>Thêm sản phẩm</h2>
  <form action="{{ url('products') }}" method="post" enctype="multipart/form-data">

    @csrf

    <div class="form-group">
      <label for="exampleInputName">Tên sản phẩm</label>
      <input type="text" class="form-control" id="TenSP" name="TenSP" placeholder="Tên sản phẩm">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail">Đơn giá</label>
      <input type="text" class="form-control" id="DonGia" name="DonGia" placeholder="Đơn giá">
    </div>

    <div class="form-group">
      <label for="exampleInputPassword">Số lượng</label>
      <input type="number" class="form-control" id="SoLuong" name="SoLuong" placeholder="Số lượng">
    </div>

    <div class="form-group">
      <label for="exampleTextarea">Mô tả</label>
      <textarea class="form-control" id="MoTa" name="MoTa" rows="3" placeholder="Mô tả"></textarea>
    </div>

    <div class="form-group">
      <label for="exampleInputImage">Hình ảnh</label>
      <div class="input-group">
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="HinhAnh" name="HinhAnh" aria-describedby="imageHelp" accept="image/*">
          <label class="custom-file-label" for="exampleInputImage">Chọn hình ảnh</label>
        </div>
      </div>
      <small id="imageHelp" class="form-text text-muted">Chọn một hình ảnh từ thiết bị của bạn.</small>
    </div>

    <br>
    <button type="submit" value="Save" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection
