@extends('users.pay.layout')

@section('content')

<div class="py-5 text-center">
    <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
    <h2>Thanh toán</h2>
    <p class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p>
</div>

<div class="row">
    <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Giỏ hàng</span>
            <span class="badge badge-secondary badge-pill">2</span>
        </h4>
        <ul class="list-group mb-3">
            @foreach($info as $key => $chiTiet)
            @php
            $product = isset($products[$key]) ? $products[$key] : null;
            @endphp

            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <h6 class="my-0">{{$product->TenSP}}</h6>
                    <small class="text-muted">{{$product->DonGia}}</small>
                    <small class="text-muted">x {{$chiTiet->SoLuong}}</small>
                </div>
                <span class="text-muted">
                    {{$chiTiet->ThanhTien}}
                </span>
            </li>
            @endforeach

            <li class="list-group-item d-flex justify-content-between">
                <span>Tổng thành tiền</span>
                <strong>{{$pay->TongTien}}</strong>
            </li>

        </ul>


        <div class="input-group">
            <input type="text" class="form-control" placeholder="Mã khuyến mãi">
            <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">Xác nhận</button>
            </div>
        </div>

    </div>
    <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Thông tin khách hàng</h4>

        <div class="row">
            <div class="col-md-12">
                <label for="kh_ten">Họ tên</label>
                <input type="text" class="form-control" name="kh_ten" id="kh_ten" value="{{$customer->TenKH}}" readonly="">
            </div>

            <div class="col-md-12">
                <label for="kh_diachi">Địa chỉ</label>
                <input type="text" class="form-control" name="kh_diachi" id="kh_diachi" value="{{$customer->DiaChi}}" readonly="">
            </div>
            <div class="col-md-12">
                <label for="kh_dienthoai">Điện thoại</label>
                <input type="text" class="form-control" name="kh_dienthoai" id="kh_dienthoai" value="{{$customer->DienThoai}}" readonly="">
            </div>
            <div class="col-md-12">
                <label for="kh_email">Email</label>
                <input type="text" class="form-control" name="kh_email" id="kh_email" value="{{$customer->Email}}" readonly="">
            </div>

        </div>
        </br>

        <h4 class="mb-3">Hình thức thanh toán</h4>

        <div class="d-block my-3">
            <div class="custom-control custom-radio">
                <input id="httt-1" name="httt_ma" type="radio" class="custom-control-input" required="" value="1">
                <label class="custom-control-label" for="httt-1">Tiền mặt</label>
            </div>
            <div class="custom-control custom-radio">
                <input id="httt-2" name="httt_ma" type="radio" class="custom-control-input" required="" value="2">
                <label class="custom-control-label" for="httt-2">Chuyển khoản</label>
            </div>
            <div class="custom-control custom-radio">
                <input id="httt-3" name="httt_ma" type="radio" class="custom-control-input" required="" value="3">
                <label class="custom-control-label" for="httt-3">Ship COD</label>
            </div>
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnDatHang">
        <i class="fas fa-check-square" style="color: white;"></i></i> <span style="color: white;">Đặt hàng</span></button>
    </div>
</div>

@endsection