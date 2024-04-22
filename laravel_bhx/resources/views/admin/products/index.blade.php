@extends('admin.products.layout')
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
          <th>Số lượng</th>
          <th>Chi tiết</th>
          <th>Sửa</th>
          <th>Xóa</th>
        </tr>
      </thead>
      <tbody>
        @foreach($products as $products)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{$products->TenSP}}</td>
          <td>{{$products->DonGia}}</td>
          <td>{{$products->SoLuong}}</td>

          <td>
            <a href="{{url('/products/' .$products->MaSP)}}" class="btn btn-primary">Chi tiết</a>
          </td>

          <td><a href="{{url('/products/' .$products->MaSP .'/edit')}}" class="btn btn-warning">Sửa</a></td>

          <td>
            <form method="POST" action="{{url('/products'.'/'.$products->MaSP)}}">
              {{method_field('DELETE')}}
              {{csrf_field()}}
              <button onclick="return confirm('Bạn có chắc muốn xóa?')" class="btn btn-primary">Xóa</button>

            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection