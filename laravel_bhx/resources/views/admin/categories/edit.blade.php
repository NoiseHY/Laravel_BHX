@extends("admin.categories.layout")

@section('content')

<div class="container">
  <h2>Cập nhật sản phẩm {{$categories->TenLoai}}</h2>
  <form action="{{url('products/' .$categories->MaLoai)}}" method="post">

    {!! csrf_field() !!}
    @method("PATCH")
    <div class="form-group">
      <label for="exampleInputName">Tên thể loại</label>
      <input type="text" class="form-control" id="TenLoai" name="TenLoai" value="{{$categories->TenLoai}}">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail">Mô tả</label>
      <input type="text" class="form-control" id="MoTa" name="MoTa" value="{{$categories->MoTa}}">
    </div>

    <br>

    <button type="submit" value="Save" class="btn btn-primary">Sửa</button>
  </form>
</div>

@endsection