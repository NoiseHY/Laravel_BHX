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
            <th>#</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th>Chi tiết</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tbody>
          @foreach($pay as $pays)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$pays->TongTien}}</td>

            <td>
              @if($pays->TrangThai == 0)
              <form method="POST" action="{{ url('/ok/' .$pays->MaHD) }}">
                @csrf
                <button type="submit" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Xác nhận</button>
              </form>
              @else
              <input type="checkbox" @if($pays->TrangThai == 1)
              checked

              @else
              data-message="Không xác định"
              @endif>
              @endif
            </td>

            <td>
              <a href="{{url('/adminPay/' .$pays->MaHD)}}" class="btn btn-primary">Chi tiết</a>
            </td>
            <td>
              <form method="POST" action="{{url('/pay'.'/'.$pays->MaHD)}}">
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
          <li class="page-item {{ $pay->currentPage() == 1 ? 'disabled' : '' }}">
            <a href="{{ $pay->url(1) }}" class="page-link rounded">&laquo;</a>
          </li>

          @for ($i = 1; $i <= $pay->lastPage(); $i++)
            <li class="page-item {{ $pay->currentPage() == $i ? 'active' : '' }}">
              <a href="{{ $pay->url($i) }}" class="page-link rounded">{{ $i }}</a>
            </li>
            @endfor

            <li class="page-item {{ $pay->currentPage() == $pay->lastPage() ? 'disabled' : '' }}">
              <a href="{{ $pay->url($pay->lastPage()) }}" class="page-link rounded">&raquo;</a>
            </li>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection