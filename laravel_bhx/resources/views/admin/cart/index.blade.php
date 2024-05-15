@extends('admin.cart.layout')

@section('content')

<h1>Danh sách giỏ hàng</h1>
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Mã giỏ hàng</th>
          <th scope="col">mã người dùng</th>
          <th scope="col">Ngày thêm </th>
          <th scope="col">Chi tiết</th>
          <th scope="col">Xóa</th>
        </tr>
      </thead>
      <tbody>
        @foreach($cart as $carts)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{$carts->MaGioHang}}</td>
          <td>{{$carts->MaNguoiDung}}</td>
          <td>{{$carts->NgayThem}}</td>

          <td>
            <a href="{{url('/adminCart/' .$carts->MaGioHang)}}" class="btn btn-primary">
              <svg class="nav-icon" style="height : 30px; width : 20px">
                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
              </svg>
            </a>
          </td>

          <td>
            <form method="POST" action="{{url('/adminCart'.'/'.$carts->MaGioHang)}}">
              {{method_field('DELETE')}}
              {{csrf_field()}}
              <button onclick="return confirm('Bạn có chắc muốn xóa?')" class="btn btn-danger">
                <svg class="nav-icon" style="height : 30px; width : 20px">
                  <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-x-circle"></use>
                </svg>
              </button>

            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="col-12">
      <div class="pagination justify-content-center mt-5">
        <li class="page-item {{ $cart->currentPage() == 1 ? 'disabled' : '' }}">
          <a href="{{ $cart->url(1) }}" class="page-link rounded">&laquo;</a>
        </li>

        @for ($i = 1; $i <= $cart->lastPage(); $i++)
          <li class="page-item {{ $cart->currentPage() == $i ? 'active' : '' }}">
            <a href="{{ $cart->url($i) }}" class="page-link rounded">{{ $i }}</a>
          </li>
          @endfor

          <li class="page-item {{ $cart->currentPage() == $cart->lastPage() ? 'disabled' : '' }}">
            <a href="{{ $cart->url($cart->lastPage()) }}" class="page-link rounded">&raquo;</a>
          </li>
      </div>
    </div>
  </div>
</div>

@endsection