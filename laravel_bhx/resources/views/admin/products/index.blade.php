@extends('admin.products.layout')
@section('content')
<h1>Danh sách sản phẩm</h1>
@if (\Session::has('message'))
<div class="alert alert-success">
  {{ \Session::get('message') }}
</div>
@endif
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>#</th>
          <th>Hình ảnh</th>
          <th>Tên sản phẩm</th>
          <th>Đơn giá</th>
          <th>Số lượng</th>
          <th>Chi tiết</th>
          <th>Sửa</th>
          <th>Xóa</th>
        </tr>
      </thead>
      <tbody>
        @foreach($products as $product)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td> <img src="{{ asset('uploads/' . $product->TenSP . '/' . $product->HinhAnh) }}" class="img-thumbnail" alt="Hình ảnh sản phẩm" style="max-width: 200px; max-height: 200px;">
          </td>
          <td>{{$product->TenSP}}</td>
          <td>{{$product->DonGia}}</td>
          <td>{{$product->SoLuong}}</td>

          <td>
            <a href="{{url('/products/' .$product->MaSP)}}" class="btn btn-primary">Chi tiết</a>
          </td>

          <td><a href="{{url('/products/' .$product->MaSP .'/edit')}}" class="btn btn-warning">Sửa</a></td>

          <td>
            <form method="POST" action="{{url('/products'.'/'.$product->MaSP)}}">
              {{method_field('DELETE')}}
              {{csrf_field()}}
              <button onclick="return confirm('Bạn có chắc muốn xóa?')" class="btn btn-danger">Xóa</button>

            </form>
          </td>

        </tr>
        @endforeach

      </tbody>
    </table>

    <div class="col-12">
      <div class="pagination justify-content-center mt-5">
        <li class="page-item {{ $products->currentPage() == 1 ? 'disabled' : '' }}">
          <a href="{{ $products->url(1) }}" class="page-link rounded">&laquo;</a>
        </li>

        @for ($i = 1; $i <= $products->lastPage(); $i++)
          <li class="page-item {{ $products->currentPage() == $i ? 'active' : '' }}">
            <a href="{{ $products->url($i) }}" class="page-link rounded">{{ $i }}</a>
          </li>
          @endfor

          <li class="page-item {{ $products->currentPage() == $products->lastPage() ? 'disabled' : '' }}">
            <a href="{{ $products->url($products->lastPage()) }}" class="page-link rounded">&raquo;</a>
          </li>
      </div>
    </div>

    </br>

  </div>
</div>


@endsection