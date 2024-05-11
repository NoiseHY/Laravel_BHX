@extends('admin.categories.layout')

@section('content')

<h1>Danh sách loại sản phẩm</h1>
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Tên loại sản phẩm</th>
          <th scope="col">Mô tả ngắn gọn</th>
          <th scope="col">Chi tiết</th>
          <th scope="col">Sửa</th>
          <th scope="col">Xóa</th>
        </tr>
      </thead>
      <tbody>
        @foreach($categories as $category)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{$category->TenLoai}}</td>
          <td>{!! Str::limit(strip_tags($category->MoTa), 100) !!}</td>
          <td>
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
    <div class="col-12">
      <div class="pagination justify-content-center mt-5">
        <li class="page-item {{ $categories->currentPage() == 1 ? 'disabled' : '' }}">
          <a href="{{ $categories->url(1) }}" class="page-link rounded">&laquo;</a>
        </li>

        @for ($i = 1; $i <= $categories->lastPage(); $i++)
          <li class="page-item {{ $categories->currentPage() == $i ? 'active' : '' }}">
            <a href="{{ $categories->url($i) }}" class="page-link rounded">{{ $i }}</a>
          </li>
          @endfor

          <li class="page-item {{ $categories->currentPage() == $categories->lastPage() ? 'disabled' : '' }}">
            <a href="{{ $categories->url($categories->lastPage()) }}" class="page-link rounded">&raquo;</a>
          </li>
      </div>
    </div>
  </div>
</div>

@endsection