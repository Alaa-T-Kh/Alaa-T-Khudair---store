@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-dark text-white py-3">
                <h5 class="mb-0"><i class="fa fa-edit me-2"></i> تعديل الطلب رقم: {{ $order->id }}</h5>
            </div>
            <div class="card-body p-4">

                <form action="{{ url('orders/update/' . $order->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-4">
                        <label class="form-label fw-bold text-secondary">اسم العميل</label>
                        <input type="text" name="customer_name" class="form-control form-control-lg"
                            value="{{ $order->customer_name }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">البريد الإلكتروني للعميل</label>
                        <input type="email" name="customer_email" class="form-control"
                            value="{{ $order->customer_email }}" required>
                    </div>

                    <hr>

                    <div id="products-container">
                        <label class="form-label fw-bold text-secondary">المنتجات المطلوبة</label>

                        @foreach ($order->products as $orderedProduct)
                            <div class="row product-row mb-3 align-items-end">
                                <div class="col-md-4">
                                    <select name="products[]" class="form-select product-select" required>
                                        <option value="" disabled>-- اختر منتج --</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}" data-price="{{ $product->price }}"
                                                {{ $product->id == $orderedProduct->id ? 'selected' : '' }}>
                                                {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="number" name="quantities[]" class="form-control quantity-input"
                                        placeholder="الكمية" min="1" value="{{ $orderedProduct->pivot->quantity }}"
                                        required>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control product-total-price"
                                        placeholder="إجمالي السعر"
                                        value="{{ $orderedProduct->pivot->quantity * $orderedProduct->price }}" readonly>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger w-100 remove-row">حذف</button>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button type="button" id="add-product" class="btn btn-outline-primary btn-sm mb-4">
                        <i class="fa fa-plus"></i> إضافة منتج آخر
                    </button>

                    <div class="row mb-4 justify-content-end">
                        <div class="col-md-4">
                            <div class="card bg-light border-0 p-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">المجموع الكلي الحالي:</span>
                                    <input type="hidden" name="total_price" id="total_price_input"
                                        value="{{ $order->total_price }}">
                                    <span id="grand-total"
                                        class="fs-5 fw-bold text-success">{{ number_format($order->total_price, 2) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-info text-white px-5 fw-bold">حفظ التعديلات</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        function calculateTotals() {
            let grandTotal = 0;
            document.querySelectorAll('.product-row').forEach(row => {
                let select = row.querySelector('.product-select');
                let quantityInput = row.querySelector('.quantity-input');
                let totalInput = row.querySelector('.product-total-price');

                let selectedOption = select.options[select.selectedIndex];
                let price = selectedOption ? parseFloat(selectedOption.getAttribute('data-price')) : 0;
                let quantity = parseFloat(quantityInput.value) || 0;

                let rowTotal = price * quantity;
                totalInput.value = rowTotal > 0 ? rowTotal.toFixed(2) : '';
                grandTotal += rowTotal;
            });
            document.getElementById('grand-total').innerText = grandTotal.toFixed(2);
            document.getElementById('total_price_input').value = grandTotal.toFixed(2);
        }

        document.getElementById('add-product').addEventListener('click', function() {
            let container = document.getElementById('products-container');
            let rows = container.querySelectorAll('.product-row');
            let row = rows[0].cloneNode(true);

            row.querySelector('.product-select').value = "";
            row.querySelector('.quantity-input').value = "";
            row.querySelector('.product-total-price').value = "";

            container.appendChild(row);
        });

        document.addEventListener('input', function(e) {
            if (e.target.classList.contains('quantity-input') || e.target.classList.contains('product-select')) {
                calculateTotals();
            }
        });

        document.addEventListener('change', function(e) {
            if (e.target.classList.contains('product-select')) {
                calculateTotals();
            }
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-row')) {
                if (document.querySelectorAll('.product-row').length > 1) {
                    e.target.closest('.product-row').remove();
                    calculateTotals();
                } else {
                    alert("يجب اختيار منتج واحد على الأقل");
                }
            }
        });
    </script>
@endsection
