@extends('admin.pay.layout')

@section('content')

<h2>Hóa đơn {{$pay->MaHD}}</h2>
<ul class="list-group">
  <li class="list-group-item">Mã hóa đơn : {{$pay->MaHD}}</li>
  <li class="list-group-item">Mã khách hàng : {{$pay->MaKH}}</li>
  <li class="list-group-item">Tổng tiền : {{$pay->TongTien}}</li>
  <li class="list-group-item">Trạng thái :
    @if($pay->TrangThai == 1)
    Đã xác nhận
    @elseif($pay->VaiTro == 2)
    Chưa xác nhận
    @else
    Không xác định
    @endif
  </li>


</ul>

</br>

<h2>Chi tiết hóa đơn {{$details->MaChiTietSP}}</h2>
<ul class="list-group">
  <li class="list-group-item">Mã chi tiết hóa đơn : {{$details->MaHD}}</li>
  <li class="list-group-item">Mã sản phẩm : {{$details->MaSP}}</li>
  <li class="list-group-item">Số lượng : {{$details->SoLuong}}</li>
  <li class="list-group-item">Đơn giá : {{$details->DonGia}}</li>
  <li class="list-group-item">Thành tiền : {{$details->ThanhTien}}</li>


</ul>

@endsection