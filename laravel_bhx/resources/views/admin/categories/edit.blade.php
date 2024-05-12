<!-- Include the Quill library -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.0/dist/quill.js"></script>

@extends("admin.categories.layout")

@section('content')

@if (\Session::has('message'))
<div class="alert alert-success">
  {{ \Session::get('message') }}
</div>
@endif

<div class="container">
  <h2>Cập nhật sản phẩm {{$categories->TenLoai}}</h2>
  <form action="{{url('categories/' .$categories->MaLoai)}}" method="post">

    {!! csrf_field() !!}
    @method("PATCH")
    <div class="form-group">
      <label for="exampleInputName">Tên thể loại</label>
      <input type="text" class="form-control" id="TenLoai" name="TenLoai" value="{{$categories->TenLoai}}">
    </div></br>

    <div class="form-group" id="editor">
      <div id="quill-editor" style="height: 200px;">{!! $categories->MoTa !!}</div>
      <input type="hidden" id="MoTa" name="MoTa">
    </div>


    <br>

    <button type="submit" value="Save" class="btn btn-primary">
      <svg class="nav-icon" style="height : 30px; width : 20px">
        <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-clear-all"></use>
      </svg> Sửa</button>
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