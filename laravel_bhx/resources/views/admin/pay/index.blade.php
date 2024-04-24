@extends('admin.pay.layout')

@section('content')

<div class="container">
  <h2>Hóa đơn</h2>

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
            <th>TT</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th>Chi tiết</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tbody>
          @foreach($pay as $pay)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$pay->TongTien}}</td>

            <td>
              @if($pay->TrangThai == 0)
              <form method="POST" action="{{ url('/ok/' .$pay->MaHD) }}">
                @csrf
                <button type="submit" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Xác nhận</button>
              </form>
              @else
              <input type="checkbox" @if($pay->TrangThai == 1)
              checked

              @else
              data-message="Không xác định"
              @endif>
              @endif
            </td>

            <td>
              <a href="{{url('/adminPay/' .$pay->MaHD)}}" class="btn btn-primary">Chi tiết</a>
            </td>
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

@endsection