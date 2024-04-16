@extends('admin.products.layout')

@section('content')

<br class="container">
<h2>Cập nhật Chi tiết sản phẩm {{$products->TenSP}} </h2>
<form action="{{url('info/' .$info->MaChiTietSP)}}" method="post">

  {!! csrf_field() !!}
  @method("PATCH")
  <div class="form-group">
    <label for="exampleInputName">Thương hiệu</label>
    <input type="text" class="form-control" id="TenSP" name="ThuongHieu" value="{{$info->ThuongHieu}}">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail">Khối lượng</label>
    <input type="numbers" class="form-control" id="DonGia" name="KhoiLuong" value="{{$info->KhoiLuong}}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword">Thành phần</label>
    <input type="text" class="form-control" id="SoLuong" name="ThanhPhan" value="{{$info->ThanhPhan}}">
  </div>


  <div class="form-group">
    <label for="exampleInputPassword">Sản xuất tại</label>
    <input type="text" class="form-control" id="SoLuong" name="SanXuatTai" value="{{$info->SanXuatTai}}">
  </div>
  <br>


  <div class="form-group">
    <label for="exampleInputPassword">Hạn sử dụng</label>
    <input type="text" class="form-control" id="SoLuong" name="HanSuDung" value="{{$info->HanSuDung}}">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword">Bảo quản</label>
    <textarea class="form-control" id="MoTa" style="height: 150px;" name="BaoQuan">{{$info->BaoQuan}}</textarea>
  </div>


  <div class="form-group">
    <label for="exampleInputPassword">Hướng dẫn sử dụng</label>
    <textarea class="form-control" id="MoTa" style="height: 150px;" name="HuongDanSuDung">{{$info->HuongDanSuDung}}</textarea>
  </div>

  <div class="row">
    <div class="col-2">
      <span class="font-weight-bold">Hình ảnh:</span>
    </div>
    <div class="col-10">
      <img src="{{ asset('uploads/' . $products->TenSP . '/' . $info->HinhAnh) }}" class="img-thumbnail" alt="Hình ảnh sản phẩm" style="max-width: 200px; max-height: 200px;">
    </div>
  </div>

  <div class="form-group">
    <label for="exampleInputImage">Hình ảnh</label>
    <div class="input-group">
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="HinhAnh" name="HinhAnh[]" aria-describedby="imageHelp" multiple>
        <label class="custom-file-label" for="exampleInputImage">Chọn hình ảnh</label>
      </div>
    </div>
    <small id="imageHelp" class="form-text text-muted">Chọn một hoặc nhiều hình ảnh từ thiết bị của bạn.</small>
  </div>


  <br>

  <button type="submit" value="Save" class="btn btn-warning">Sửa</button>
</form>
</br>
</div>

@endsection