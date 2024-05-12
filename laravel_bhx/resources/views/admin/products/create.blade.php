<!-- Include the Quill library -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.0/dist/quill.js"></script>

@extends('admin.products.layout')
@section('content')
<div class="container">
  <h2>Thêm sản phẩm</h2>

  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif


  <form action="{{ url('products') }}" method="post" enctype="multipart/form-data">

    @csrf

    <div class="form-group">
      <label for="exampleInputName">Tên sản phẩm</label>
      <input type="text" class="form-control" id="TenSP" name="TenSP" placeholder="Tên sản phẩm">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail">Đơn giá</label>
      <input type="number" class="form-control" id="DonGia" name="DonGia" placeholder="Đơn giá">
    </div>

    <div class="form-group">
      <label for="exampleInputPassword">Số lượng</label>
      <input type="number" class="form-control" id="SoLuong" name="SoLuong" placeholder="Số lượng">
    </div></br>

    <label>Mô tả</label>
    <div class="form-group" id="editor">
      <div id="quill-editor" style="height: 200px;"></div>
      <input type="text" id="MoTa" name="MoTa" style="display: none;">
    </div>
    </br>

    <select class="form-select" aria-label="Chọn thể loại" name="MaLoai">
      <option value="">Tất cả thể loại</option>
      @foreach($category as $category)
      <option id="MaLoai" value="{{$category->MaLoai}}">{{$category->TenLoai}}</option>
      @endforeach
    </select></br>

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

<link href="https://cdn.jsdelivr.net/npm/quill@2.0.0/dist/quill.snow.css" rel="stylesheet" />

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Initialize Quill editor
    const quill = new Quill('#quill-editor', {
      theme: 'snow'
    });

    // Lấy nội dung editor khi form submit và gán vào input text
    document.querySelector('form').addEventListener('submit', function() {
      const quillInput = document.getElementById('MoTa');
      quillInput.value = quill.root.innerHTML;
    });
  });
</script>
@endsection