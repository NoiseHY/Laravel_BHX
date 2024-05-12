@extends('admin.users.layout')
@section('content')
<h1>Danh sách người dùng</h1>
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
          <th>Tên đăng nhập</th>
          <th>Họ và tên</th>
          <th>Vai trò</th>
          <th>Trạng thái</th>
          <th>Chi tiết</th>
          <th>Sửa</th>
          <th>Xóa</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{$user->TenDangNhap}}</td>
          <td>{{$user->HoTen}}</td>
          <td>
            @if($user->VaiTro == 1)
            Admin
            @elseif($user->VaiTro == 2)
            Khách hàng
            @else
            Vai trò không xác định
            @endif
          </td>

          <td>
            <input type="checkbox" {{ $user->TrangThai == 1 ? 'checked' : '' }}>
          </td>

          <td>
            <a href="{{url('/users/' .$user->MaNguoiDung)}}" class="btn btn-primary">
              <svg class="nav-icon" style="height : 30px; width : 20px">
                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
              </svg>
            </a>
          </td>
          <td><a href="{{url('/users/' .$user->MaNguoiDung .'/edit')}}" class="btn btn-warning">
              <svg class="nav-icon" style="height : 30px; width : 20px">
                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-clear-all"></use>
              </svg>
            </a></td>
          <td>
            <form method="POST" action="{{url('/user'.'/'.$user->MaNguoiDung)}}">
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
        <li class="page-item {{ $users->currentPage() == 1 ? 'disabled' : '' }}">
          <a href="{{ $users->url(1) }}" class="page-link rounded">&laquo;</a>
        </li>

        @for ($i = 1; $i <= $users->lastPage(); $i++)
          <li class="page-item {{ $users->currentPage() == $i ? 'active' : '' }}">
            <a href="{{ $users->url($i) }}" class="page-link rounded">{{ $i }}</a>
          </li>
          @endfor

          <li class="page-item {{ $users->currentPage() == $users->lastPage() ? 'disabled' : '' }}">
            <a href="{{ $users->url($users->lastPage()) }}" class="page-link rounded">&raquo;</a>
          </li>
      </div>
    </div>

  </div>
</div>

@endsection