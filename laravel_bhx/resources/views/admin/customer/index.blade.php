@extends('admin.customer.layout')

@section('content')

<h1>Danh sách khách hàng</h1>
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Mã khách hàng</th>
          <th scope="col">Tên khách hàng</th>
          <th scope="col">Địa chỉ </th>
          <th scope="col">Điện thoại</th>
          <th scope="col">Email</th>
          <th scope="col">Mã người dùng</th>
          <th scope="col">Chi tiết</th>

        </tr>
      </thead>
      <tbody>
        @foreach($cust as $custs)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{$custs->MaKH}}</td>
          <td>{{$custs->TenKH}}</td>
          <td>{{$custs->DiaChi}}</td>
          <td>{{$custs->DienThoai}}</td>
          <td>{{$custs->Email}}</td>
          <td>{{$custs->MaNguoiDung}}</td>
          

          <td>
            <a href="{{url('/adminCust/' .$custs->MaKH)}}" class="btn btn-primary">
              <svg class="nav-icon" style="height : 30px; width : 20px">
                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
              </svg>
            </a>
          </td>

          
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="col-12">
      <div class="pagination justify-content-center mt-5">
        <li class="page-item {{ $cust->currentPage() == 1 ? 'disabled' : '' }}">
          <a href="{{ $cust->url(1) }}" class="page-link rounded">&laquo;</a>
        </li>

        @for ($i = 1; $i <= $cust->lastPage(); $i++)
          <li class="page-item {{ $cust->currentPage() == $i ? 'active' : '' }}">
            <a href="{{ $cust->url($i) }}" class="page-link rounded">{{ $i }}</a>
          </li>
          @endfor

          <li class="page-item {{ $cust->currentPage() == $cust->lastPage() ? 'disabled' : '' }}">
            <a href="{{ $cust->url($cust->lastPage()) }}" class="page-link rounded">&raquo;</a>
          </li>
      </div>
    </div>
  </div>
</div>

@endsection