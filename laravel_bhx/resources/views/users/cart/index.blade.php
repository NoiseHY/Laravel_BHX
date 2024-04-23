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


                    <?php
                    // dd($product->MaSP);
                    ?>
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
                            <p name="DonGia" class="mb-0 mt-4"> {{ $product ? $product->DonGia : '' }} </p>
                        </td>

                        <td>
                            <div class="input-group quantity mt-4" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- soluong -->
                                <input name="SoLuong" type="text" id="number" class="form-control form-control-sm text-center border-0 quantity-input" value="{{ $cartItem->SoLuong }}">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>

                        <td>
                            <p class="mb-0 mt-4" id="TongTien">{{ $product->DonGia * ($cartItem->SoLuong) }} </p>
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

                        <td>
                            <input type="hidden" name="productID" value="{{$product->MaSP}}">

                        </td>
                    </tr>
                    @endforeach

                </tbody>

            </table>
        </div>

        <div class="row g-4 justify-content-end">


            <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                <form method="post" action="{{ url('pay') }}">
                    {!! csrf_field() !!}

                    <!-- Modal -->
                    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="productModalLabel">Thông tin sản phẩm được chọn</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Thông tin chi tiết sản phẩm sẽ được hiển thị ở đây -->
                                    <div id="productDetails">
                                        <!-- Dữ liệu sản phẩm sẽ được thêm bằng JavaScript -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="products[]" id="productsInput" value="">

                    <div class="bg-light rounded">
                        <div class="p-4">
                            <h1 class="fw-normal">Tổng tiền</h1>
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="mb-0 me-4">Tổng tiền : </h5>
                                <p id="total-price-display" class="mb-0">0 </p>
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
                            <input class="form-control form-control-sm text-center border-0 quantity-input" id="total-price-input" name="total-price">
                        </div>

                        <button id="saveButton" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="submit" value="Save">Thanh toán</button>

                </form>

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
                    input.value = parseInt(input.value) - 0;
                    updateCartItem(this.closest('tr'));
                }
            });
        });

        // Hàm cập nhật giỏ hàng khi số lượng sản phẩm thay đổi
        function updateCartItem(row) {
            var quantity = parseInt(row.querySelector('.quantity-input').value);
            var price = parseFloat(row.querySelector('.product-checkbox').getAttribute('data-price'));
            var totalPrice = quantity * price;
            row.querySelector('#TongTien').textContent = totalPrice ;
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
            document.getElementById('total-price-display').textContent = total ;
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
            row.querySelector('#TongTien').textContent = totalPrice ;
            updateTotalPrice();

            // Cập nhật giá trị của input ẩn "quantities"
            var quantitiesInput = document.querySelector('input[name="quantities"]');
            var productId = row.querySelector('.product-checkbox').getAttribute('data-product-id');
            quantitiesInput.value = quantity + '|' + productId;
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
            document.getElementById('total-price-display').textContent = total ;
            // Sau khi cập nhật tổng tiền, cập nhật lại giá trị trong trường input ẩn
            document.getElementById('total-price-input').value = total;
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        var totalPriceDisplay = document.getElementById('total-price-display');

        var totalPriceInput = document.getElementById('total-price-input');

        totalPriceInput.value = totalPriceDisplay.textContent.trim();

    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Khởi tạo mảng để lưu thông tin sản phẩm
        var selectedProducts = [];

        // Lắng nghe sự kiện click trên các checkbox
        var checkboxes = document.querySelectorAll('.product-checkbox');
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    // Lấy thông tin sản phẩm từ hàng được chọn
                    var row = this.closest('tr');
                    var productName = row.querySelector('td:nth-child(3)').innerText.trim();
                    var productPrice = row.querySelector('td:nth-child(4)').innerText.trim();
                    var productQuantity = row.querySelector('input[name="SoLuong"]').value.trim();
                    var totalPrice = row.querySelector('#TongTien').innerText.trim();
                    var productID = row.querySelector('input[name="productID"]').value.trim();

                    // Lưu thông tin sản phẩm vào mảng
                    var product = {
                        name: productName,
                        price: productPrice,
                        quantity: productQuantity,
                        totalPrice: totalPrice,
                        productID: productID
                    };
                    selectedProducts.push(product);

                    // Cập nhật giá trị của hidden input
                    updateHiddenInput(selectedProducts);

                    // Hiển thị modal


                } else {
                    // Nếu checkbox được bỏ chọn, loại bỏ sản phẩm khỏi mảng
                    var index = selectedProducts.findIndex(function(product) {
                        return product.name === productName;
                    });
                    selectedProducts.splice(index, 1);

                    // Cập nhật giá trị của hidden input
                    updateHiddenInput(selectedProducts);
                }
            });
        });

        // Hàm cập nhật giá trị của hidden input
        function updateHiddenInput(products) {
            var productsInput = document.getElementById('productsInput');
            productsInput.value = JSON.stringify(products);
        }
    });
</script>








@endsection