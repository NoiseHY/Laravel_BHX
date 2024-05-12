<script src="https://cdn.jsdelivr.net/npm/quill@2.0.0/dist/quill.js"></script>


@extends('admin.products.layout')

@section('content')


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

<h2>Cập nhật thông tin chi tiết sản phẩm <span style="color: red;">{{$products->TenSP}}</span></h2>

<form action="{{url('info/' .$info->MaSP)}}" method="post">
  {!! csrf_field() !!}
  @method("PATCH")
  <div class="form-group">
    <label>Thương hiệu</label>
    <input type="text" class="form-control" name="ThuongHieu" value="{{$info->ThuongHieu}}">
  </div>

  <div class="form-group">
    <label>Khối lượng</label>
    <input type="numbers" class="form-control" name="KhoiLuong" value="{{$info->KhoiLuong}}">
  </div>

  <div class="form-group">
    <label>Đơn vị</label>
    <input type="numbers" class="form-control" name="DonVi" value="{{$info->DonVi}}">
  </div>

  <div class="form-group">
    <label>Sản xuất tại</label>
    <input type="text" class="form-control" name="SanXuatTai" value="{{$info->SanXuatTai}}">
  </div>
  <br>


  <div class="form-group">
    <label>Hạn sử dụng</label>
    <input type="text" class="form-control" name="HanSuDung" value="{{$info->HanSuDung}}">
  </div>

  <div class="form-group">
    <label>Thành phần</label>
    <textarea style="height: 150px;" type="text" class="form-control" name="ThanhPhan" value="">{{$info->ThanhPhan}}</textarea>
  </div>

  <div class="form-group">
    <label>Bảo quản</label>
    <textarea class="form-control" style="height: 150px;" name="BaoQuan">{{$info->BaoQuan}}</textarea>
  </div></br>

  <label>Hướng dẫn sử dụng</label>
  <div class="form-group" id="editor">
    <div id="quill-editor" style="height: 200px;">{!! $info->HuongDanSuDung !!}</div>
    <input type="hidden" id="HuongDanSuDung" name="HuongDanSuDung">
  </div>
  </br>

  <div class="row">
    <div class="col-2">
      <span class="font-weight-bold">Hình ảnh:</span>
    </div>
    <div class="col-10">
      @if(isset($info) && $info->HinhAnh)
      @foreach (json_decode($info->HinhAnh) as $image)
      <img src="{{ asset('uploads/' . $products->TenSP . '/' . $image) }}" class="img-thumbnail" alt="Hình ảnh sản phẩm" style="max-width: 200px; max-height: 200px;">
      @endforeach
      @else
      <!-- Hiển thị một thông báo hoặc hình ảnh mặc định nếu không có hình ảnh -->
      <p>Không có hình ảnh</p>
      @endif


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

  <button type="submit" value="Save" class="btn btn-warning">
    <svg class="nav-icon" style="height : 30px; width : 20px">
      <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-clear-all"></use>
    </svg>
    Sửa</button>
</form>
</br>
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
      const quillInput = document.getElementById('HuongDanSuDung');
      quillInput.value = quill.root.innerHTML;
    });
  });
</script>

@endsection