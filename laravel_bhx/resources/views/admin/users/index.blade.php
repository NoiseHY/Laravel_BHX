@extends('admin.users.layout')
@section('content')
<h1>Chi tiết sản phẩm</h1>
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>TT</th>
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
        @foreach($users as $users)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{$users->TenDangNhap}}</td>
          <td>{{$users->HoTen}}</td>
          <td>
            @if($users->VaiTro == 1)
            Admin
            @elseif($users->VaiTro == 2)
            Khách hàng
            @else
            Vai trò không xác định
            @endif
          </td>

          <td>
            <input type="checkbox" {{ $users->TrangThai == 1 ? 'checked' : '' }}>
          </td>

          <td>
            <a href="{{url('/users/' .$users->MaNguoiDung)}}" class="btn btn-primary">Chi tiết</a>
          </td>
          <td><a href="{{url('/users/' .$users->MaNguoiDung .'/edit')}}" class="btn btn-warning">Sửa</a></td>
          <td>
            <form method="POST" action="{{url('/users'.'/'.$users->MaNguoiDung)}}">
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