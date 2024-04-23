@extends('users.profile.layout')

@section('content')

<div class="container">
  <h2>Thông tin tài khoản </h2>
  @if (\Session::has('message'))
  <div class="alert alert-success">
    {{ \Session::get('message') }}
  </div>
  @endif
  <form action="{{url('profile/' .$user->MaNguoiDung)}}" method="post">

    {!! csrf_field() !!}
    @method("PATCH")
    <div class="form-group">
      <label for="exampleInputName">Tên đăng nhập</label>
      <input readonly type="text" class="form-control" id="TenDangNhap" name="TenDangNhap" value="{{$user->TenDangNhap}}">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail">Mật khẩu</label>
      <input type="password" class="form-control" id="MatKhau" name="MatKhau" value="{{$user->MatKhau}}">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword">Họ và tên</label>
      <input type="text" class="form-control" id="HoTen" name="HoTen" value="{{$user->HoTen}}">
    </div>
    <!-- type="email" -->
    <div class="form-group">
      <label for="exampleInputPassword">Email</label>
      <input type="text" class="form-control" id="Email" name="Email" value="{{$user->Email}}">
    </div>
    <br>

    <button type="submit" value="Save" class="btn btn-primary">Sửa</button>
    </br>

  </form>
</div>
</br >

<div class="container">
  <h2>Hóa đơn</h2>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>TT</th>
            <th>Tổng tiền</th>
            <th>TTrạng thái</th>
            <th>Chi tiết</th>
            <th>Sửa</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tbody>
          @foreach($pay as $pay)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$pay->TongTien}}</td>

            <td>
              <input type="checkbox" {{ $pay->TrangThai == 1 ? 'checked' : '' }}>
            </td>

            <td>
              <a href="{{url('/pay/' .$pay->MaHD)}}" class="btn btn-primary">Chi tiết</a>
            </td>
            <td><a href="{{url('/pay/' .$pay->MaHD .'/edit')}}" class="btn btn-warning">Sửa</a></td>
            <td>
              <form method="POST" action="{{url('/pay'.'/'.$pay->MaHD)}}">
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
</div>

</br>


@endsection