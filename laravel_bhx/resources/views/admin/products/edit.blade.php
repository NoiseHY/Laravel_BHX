<script src="https://cdn.jsdelivr.net/npm/quill@2.0.0/dist/quill.js"></script>

@extends('admin.products.layout')
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

  <h2>Cập nhật sản phẩm <span style="color: red;">{{$products->TenSP}}</span></h2>
  <form action="{{url('products/' .$products->MaSP)}}" method="post">

    {!! csrf_field() !!}
    @method("PATCH")
    <div class="form-group">
      <label for="exampleInputName">Tên sản phẩm</label>
      <input type="text" class="form-control" id="TenSP" name="TenSP" value="{{$products->TenSP}}">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail">Đơn giá</label>
      <input type="number" class="form-control" id="DonGia" name="DonGia" value="{{$products->DonGia}}">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword">Số lượng</label>
      <input type="text" class="form-control" id="SoLuong" name="SoLuong" value="{{$products->SoLuong}}">
    </div></br>

    <label>Mô tả</label>
    <div class="form-group" id="editor">
      <div id="quill-editor" style="height: 200px;">{!! $products->MoTa !!}</div>
      <textarea class="form-control" id="MoTa" name="MoTa" style="display: none;"></textarea>
    </div>
    </br>

    <div class="form-group">
      <label for="exampleInputPassword">Thể loại </label>
      <input class="form-control" name="MaLoai" value="{{$products->MaLoai}}" id="MaLoai"></input>
    </div>
    <br>

    <select class="form-select" aria-label="Chọn thể loại" id="selectLoai" onchange="updateMaLoai()">
      <option value="">Tất cả thể loại</option>
      @foreach($category as $cat)
      <option value="{{$cat->MaLoai}}">{{$cat->TenLoai}}</option>
      @endforeach
    </select></br>

    <div class="row">
      <div class="col-2">
        <span class="font-weight-bold">Hình ảnh:</span>
      </div>
      <div class="col-10">
        <img src="{{ asset('uploads/' . $products->TenSP . '/' . $products->HinhAnh) }}" class="img-thumbnail" alt="Hình ảnh sản phẩm" style="max-width: 200px; max-height: 200px;">
      </div>
    </div>


    <br>

    <button type="submit" value="Save" class="btn btn-warning">
      <svg class="nav-icon" style="height : 30px; width : 20px">
        <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-clear-all"></use>
      </svg>
      Sửa</button>
  </form>
</div>

<script>
  function updateMaLoai() {
    var selectBox = document.getElementById("selectLoai");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    document.getElementById("MaLoai").value = selectedValue;
  }

  document.addEventListener('DOMContentLoaded', function() {
    // Initialize Quill editor
    const quill = new Quill('#quill-editor', {
      theme: 'snow'
    });

    document.querySelector('form').addEventListener('submit', function() {
      const quillInput = document.getElementById('MoTa');
      quillInput.value = quill.root.innerHTML;
    });
  });
</script>

<link href="https://cdn.jsdelivr.net/npm/quill@2.0.0/dist/quill.snow.css" rel="stylesheet" />

@endsection