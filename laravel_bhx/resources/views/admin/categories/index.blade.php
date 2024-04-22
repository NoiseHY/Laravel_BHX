@extends('admin.categories.layout')

@section('content')

<h1>Danh sách sản phẩm</h1>
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>TT</th>
          <th>Tên sản phẩm</th>
          <th>Đơn giá</th>
          <th>Chi tiết</th>
          <th>Sửa</th>
          <th>Xóa</th>
        </tr>
      </thead>
      <tbody>
        @foreach($categories as $category)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{$category->TenLoai}}</td>
          <td>{{$category->MoTa}}</td>
          <td>
            <a href="{{url('/categories/' .$category->MaLoai)}}" class="btn btn-primary">Chi tiết</a>
          </td>

          <td><a href="{{url('/categories/' .$category->MaLoai .'/edit')}}" class="btn btn-warning">Sửa</a></td>


        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection