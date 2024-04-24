@extends('admin.categories.layout')

@section('content')

<h1>Danh sách loại sản phẩm</h1>
<div class="card-body">
  <div class="table-responsive">
  <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th scope="col">#</th> <th scope="col">Tên loại sản phẩm</th>
      <th scope="col">Mô tả ngắn gọn</th> <th scope="col">Chi tiết</th>
      <th scope="col">Sửa</th>
      <th scope="col">Xóa</th>
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $category)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{$category->TenLoai}}</td>
        <td>{{ Str::limit($category->MoTa, 50) }}</td> <td>
          <a href="{{ route('categories.show', $category->MaLoai) }}" class="btn btn-primary">Chi tiết</a>
        </td>
        <td>
          <a href="{{ route('categories.edit', $category->MaLoai) }}" class="btn btn-warning">Sửa</a>
        </td>
        <td>
          <form action="{{ route('categories.destroy', $category->MaLoai) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Xóa</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

  </div>
</div>

@endsection