@extends('users.cart.layout')

@section('content')



<div class="container-fluid py-5">
    <div class="container py-5">
        @if (\Session::has('message'))
        <div class="alert alert-success">
            {{ \Session::get('message') }}
        </div>
        @endif
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá cả</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Xử lý</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $key => $cartItem)
                    @php
                    $product = isset($products[$key]) ? $products[$key] : null;
                    @endphp
                    <tr>
                        <th scope="row">
                            <div class="d-flex align-items-center">
                                <img src="{{ $product ? asset('uploads/' . $product->TenSP . '/' . $product->HinhAnh) : '' }}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                            </div>
                        </th>
                        <td>
                            <p class="mb-0 mt-4">{{ $product ? $product->TenSP : '' }}</p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4"> {{ $product ? $product->DonGia : '' }} đ</p>
                        </td>

                        <td>
                            <div class="input-group quantity mt-4" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control form-control-sm text-center border-0" value="{{ $cartItem->SoLuong }}">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        
                        <!-- dd($product->DonGia, $product->SoLuong); -->

                        <td>
                            <p class="mb-0 mt-4">{{ $product->DonGia * ($cartItem->SoLuong) }} đ</p>
                        </td>

                        <td>
                            <form method="post" action="{{url('/cart'.'/' .$cartItem->MaChiTietGioHang)}}">
                                {{method_field('DELETE')}}
                                {{csrf_field()}}

                                <button onclick="return confirm('Bạn có chắc muốn xóa?')" class="btn btn-md rounded-circle bg-light border mt-4">
                                    <i class="fa fa-times text-danger"></i>
                                </button>

                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        
        <div class="row g-4 justify-content-end">
            <div class="col-8"></div>
            <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                <div class="bg-light rounded">
                    <div class="p-4">
                        <h1 class="display-6 mb-4">Giỏ hàng <span class="fw-normal">Tổng tiền</span></h1>
                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="mb-0 me-4">Tổng tiền :</h5>
                            <p class="mb-0">$96.00</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0 me-4">Shipping : </h5>
                            <div class="">
                                <p class="mb-0">50.000 đ</p>
                            </div>
                        </div>
                        <p class="mb-0 text-end">Shipping to ...</p>
                    </div>
                    <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                        <h5 class="mb-0 ps-4 me-4">Thành tiền :</h5>
                        <p class="mb-0 pe-4">$99.00</p>
                    </div>
                    <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">Thanh toán</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection