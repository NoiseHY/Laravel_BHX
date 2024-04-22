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
                        <th scope="col">Chọn</th>
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
                        <th>
                            <input type="checkbox" class="form-check-input product-checkbox" data-price="{{ $product->DonGia }}" data-quantity="{{ (isset($cartItem) && $cartItem->SoLuong > 0) ? $cartItem->SoLuong : 1 }}" data-product-id="{{ $product->id }}">
                        </th>


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
                                <!-- soluong -->
                                <input type="text" id="number" class="form-control form-control-sm text-center border-0 quantity-input" value="{{ $cartItem->SoLuong }}">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>

                        <td>
                            <p class="mb-0 mt-4" id="TongTien">{{ $product->DonGia * ($cartItem->SoLuong) }} đ</p>
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
                        <h1 class="fw-normal">Tổng tiền</h1>
                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="mb-0 me-4">Tổng tiền : </h5>
                            <p id="total-price" class="mb-0">0 đ</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0 me-4">Shipping : </h5>
                            <div class="">
                                <p class="mb-0">50.000 đ</p>
                            </div>
                        </div>
                    </div>
                    <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                        <h5 class="mb-0 ps-4 me-4">Thành tiền :</h5>
                        <p id="total-price" class="mb-0 ps-4 me-4"> đ</p>
                    </div>

                    <!-- Thêm nút thanh toán -->
                    <button id="checkout-button" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">Thanh toán</button>
                </div>
            </div>
        </div>


    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Lấy tất cả các ô input số lượng
        var quantityInputs = document.querySelectorAll('.quantity-input');

        // Lặp qua từng ô input số lượng và thêm sự kiện 'input'
        quantityInputs.forEach(function(input) {
            input.addEventListener('input', function() {
                updateCartItem(this.closest('tr'));
            });
        });

        // Lấy tất cả các nút "+" và "-" và thêm sự kiện 'click'
        var plusButtons = document.querySelectorAll('.btn-plus');
        var minusButtons = document.querySelectorAll('.btn-minus');

        plusButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var input = this.closest('.input-group').querySelector('.quantity-input');
                input.value = parseInt(input.value) + 0;
                updateCartItem(this.closest('tr'));
            });
        });

        minusButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var input = this.closest('.input-group').querySelector('.quantity-input');
                if (parseInt(input.value) > 1) {
                    input.value = parseInt(input.value) - 1;
                    updateCartItem(this.closest('tr'));
                }
            });
        });

        // Hàm cập nhật giỏ hàng khi số lượng sản phẩm thay đổi
        function updateCartItem(row) {
            var quantity = parseInt(row.querySelector('.quantity-input').value);
            var price = parseFloat(row.querySelector('.product-checkbox').getAttribute('data-price'));
            var totalPrice = quantity * price;
            row.querySelector('#TongTien').textContent = totalPrice + ' đ';
            updateTotalPrice();
        }

        // Hàm cập nhật tổng tiền của tất cả sản phẩm trong giỏ hàng
        function updateTotalPrice() {
            var total = 0;
            var checkboxes = document.querySelectorAll('.product-checkbox:checked');
            checkboxes.forEach(function(checkbox) {
                var quantity = parseInt(checkbox.getAttribute('data-quantity'));
                var price = parseFloat(checkbox.getAttribute('data-price'));
                total += quantity * price;
            });
            document.getElementById('total-price').textContent = total + ' đ';
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Lấy tất cả các ô input số lượng
        var quantityInputs = document.querySelectorAll('.quantity-input');
        // Lặp qua từng ô input số lượng và thêm sự kiện 'input'
        quantityInputs.forEach(function(input) {
            input.addEventListener('input', function() {
                updateCartItem(this.closest('tr'));
            });
        });

        // Lấy tất cả các checkbox sản phẩm
        var checkboxes = document.querySelectorAll('.product-checkbox');
        // Lắng nghe sự kiện click trên mỗi checkbox
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('click', function() {
                updateTotalPrice();
            });
        });

        // Hàm cập nhật giỏ hàng khi số lượng sản phẩm thay đổi
        function updateCartItem(row) {
            var quantity = parseInt(row.querySelector('.quantity-input').value);
            var price = parseFloat(row.querySelector('.product-checkbox').getAttribute('data-price'));
            var totalPrice = quantity * price;
            row.querySelector('#TongTien').textContent = totalPrice + ' đ';
            updateTotalPrice();
        }

        // Hàm cập nhật tổng tiền của tất cả sản phẩm trong giỏ hàng
        function updateTotalPrice() {
            var total = 0;
            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    var quantity = parseInt(checkbox.closest('tr').querySelector('.quantity-input').value);
                    var price = parseFloat(checkbox.getAttribute('data-price'));
                    total += quantity * price;
                }
            });
            document.getElementById('total-price').textContent = total + ' đ';
        }
    });
</script>



@endsection