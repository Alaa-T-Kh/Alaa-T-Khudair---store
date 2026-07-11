@extends('layouts.front')

@section('content')
    <!-- Carousel Section -->
    <div id="myCarousel" class="carousel slide mb-5 shadow-sm" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active"
                style="min-height: 400px; background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);">
                <div class="container h-100">
                    <div
                        class="carousel-caption text-start h-100 d-flex flex-column justify-content-center align-items-start">
                        <h1 class="fw-bold mb-3">استثمر في مستقبلك اللغوي</h1>
                        <p class="opacity-75 fs-5 max-width-600">
                            تشير الدراسات الإحصائية حسب الجمعية الأمريكية للغات بأن الإقبال على العربية زاد %126 في الولايات
                            المتحدة الأمريكية وحدها بين عامي 2002 و2009م.
                        </p>
                        <p class="mt-3"><a class="btn btn-lg btn-warning rounded-pill px-4 fw-bold text-dark"
                                href="#">سجل اليوم</a></p>
                    </div>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item"
                style="min-height: 400px; background: linear-gradient(135deg, #0F2027 0%, #203A43 50%, #2C5364 100%);">
                <div class="container h-100">
                    <div
                        class="carousel-caption h-100 d-flex flex-column justify-content-center align-items-center text-center">
                        <h1 class="fw-bold mb-3">عزز مهاراتك الإنجليزية</h1>
                        <p class="fs-5 max-width-600">
                            حسب المجلس الثقافي البريطاني فإن تعليم الإنجليزية داخل بريطانيا يسهم في تعزيز اقتصادها بما
                            يتجاوز ملياري جنيه سنوياً، كما أنه وفر أكثر من 26 ألف وظيفة.
                        </p>
                        <p class="mt-3"><a class="btn btn-lg btn-primary rounded-pill px-4 fw-bold" href="#">اعرف
                                أكثر</a></p>
                    </div>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item"
                style="min-height: 400px; background: linear-gradient(135deg, #1d976c 0%, #93f9b9 100%);">
                <div class="container h-100">
                    <div class="carousel-caption text-end h-100 d-flex flex-column justify-content-center align-items-end">
                        <h1 class="fw-bold mb-3 text-dark">أبعاد الاستثمار اللغوي</h1>
                        <p class="fs-5 text-dark opacity-85 max-width-600">
                            الإحصاءات لحجم الاستثمار اللغوي خارج بريطانيا تتفاوت من سنة لأخرى إلا أن المدير التنفيذي للمجلس
                            الثقافي البريطاني إدي بايرز يرى أن استثمار تعليم الإنجليزية في الخارج لا يحسب على المستوى المالي
                            فحسب بل على السياسي أيضاً.
                        </p>
                        <p class="mt-3"><a class="btn btn-lg btn-dark rounded-pill px-4 fw-bold" href="#">تصفح
                                المعرض</a></p>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">السابق</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">التالي</span>
        </button>
    </div>

    <div class="container marketing py-4">

        <!-- Search Bar Section (شريط البحث المضاف) -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-6">
                <form action="#" method="GET" class="d-flex shadow-sm rounded-pill overflow-hidden border">
                    <input type="search" name="search" class="form-control border-0 px-4 py-2" placeholder="ابحث عن منتج..." aria-label="Search">
                    <button class="btn btn-primary px-4" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Products Marketing Section -->
        <div class="row g-4 justify-content-center">
            @foreach ($products as $product)
                <div class="col-md-6 col-lg-4 text-center">
                    <div class="p-4 border rounded-3 h-100 shadow-sm bg-white transition-hover">
                        <div class="d-flex align-items-center justify-content-center bg-light rounded-circle mx-auto mb-3"
                            style="width: 100px; height: 100px;">
                            <i class="fa fa-box open-box text-secondary fs-1"></i>
                        </div>
                        <h3 class="fw-bold fs-4 mb-2 text-dark">{{ $product->name }}</h3>
                        <p class="text-muted small mb-4 line-clamp-3">
                            {{ $product->description }}
                        </p>
                        <p class="mb-0"><a class="btn btn-sm btn-outline-secondary rounded-pill px-3" href="#">عرض
                                التفاصيل</a></p>
                    </div>
                </div>
            @endforeach
        </div>

        <hr class="featurette-divider my-5" />

        <!-- Order Action Button Container -->
        <div class="order-action-container">
            <div class="text-center my-4">
                <button type="button" id="showOrderFormBtn"
                    class="btn btn-success btn-lg rounded-pill py-3 px-5 shadow fw-bold d-flex align-items-center justify-content-center gap-2 mx-auto transition-transform">
                    <i class="fa fa-shopping-cart fs-5"></i>
                    <span>اطلب الآن</span>
                </button>
            </div>

            <!-- Order Form Section -->
            <div id="orderFormContainer" class="d-none mt-5">
                <div class="card shadow border-0 rounded-3 overflow-hidden">
                    <div class="card-header bg-dark text-white py-3 px-4">
                        <h5 class="mb-0 fw-bold"><i class="fa fa-plus-circle me-2 text-success"></i> إنشاء طلب جديد</h5>
                    </div>
                    <div class="card-body p-4 bg-light-subtle">
                        <form action="{{ route('orders.store') }}" method="POST">
                            @csrf

                            <!-- Customer Information -->
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-dark small">اسم العميل <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white"><i class="fa fa-user text-muted"></i></span>
                                        <input type="text" name="customer_name" class="form-control"
                                            placeholder="أدخل اسمك الكامل" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-dark small">البريد الإلكتروني <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white"><i
                                                class="fa fa-envelope text-muted"></i></span>
                                        <input type="email" name="customer_email" class="form-control"
                                            placeholder="example@domain.com" required>
                                    </div>
                                </div>
                            </div>

                            <hr class="text-muted opacity-25">

                            <!-- Dynamic Products Selection Area -->
                            <div id="products-container" class="mb-3">
                                <label class="form-label fw-bold text-dark mb-3"><i
                                        class="fa fa-list-ol me-1 text-primary"></i> المنتجات المطلوبة</label>

                                <!-- Product Row Template -->
                                <div
                                    class="row product-row g-2 mb-3 align-items-end p-3 bg-white border rounded shadow-sm">
                                    <div class="col-md-4">
                                        <label class="form-label small fw-bold text-muted mb-1">اختر المنتج</label>
                                        <select name="products[]" class="form-select product-select" required>
                                            <option value="" selected disabled>-- اختر منتج --</option>
                                            @foreach ($products as $prod)
                                                <option value="{{ $prod->id }}" data-price="{{ $prod->price }}">
                                                    {{ $prod->name }} ({{ number_format($prod->price, 2) }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label small fw-bold text-muted mb-1">الكمية</label>
                                        <input type="number" name="quantities[]" class="form-control quantity-input"
                                            min="1" value="1" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label small fw-bold text-muted mb-1">إجمالي سعر الصنف</label>
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control product-total-price text-center fw-bold bg-light"
                                                readonly placeholder="0.00">
                                            <span class="input-group-text bg-light text-muted small">شيكل </span>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-outline-danger w-100 remove-row">
                                            <i class="fa fa-trash-alt me-1"></i> حذف
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Add More Products Button -->
                            <button type="button" id="add-product"
                                class="btn btn-outline-primary btn-sm rounded-pill px-3 mb-4 transition-hover">
                                <i class="fa fa-plus-circle me-1"></i> إضافة منتج آخر
                            </button>

                            <!-- Grand Total Section (في مكانه السابق وبخلفية سكنية فاتحة) -->
                            <div class="row mb-4 justify-content-end">
                                <div class="col-md-4">
                                    <div class="card bg-light border p-3 rounded-3 shadow-sm">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fw-bold text-secondary">المجموع الكلي للطلب:</span>
                                            <input type="hidden" name="total_price" id="total_price_input" value="0">
                                            <div>
                                                <span id="grand-total" class="fs-4 fw-bold text-dark">0.00</span>
                                                <span class="small ms-1 text-muted">شيكل</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Button -->
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success px-5 fw-bold btn-lg rounded-pill shadow-sm">
                                    تأكيد وحفظ الطلب
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <style>
                    .transition-hover {
                        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
                    }

                    .transition-hover:hover {
                        transform: translateY(-5px);
                        box-shadow: 0 .5rem 1.5rem rgba(0, 0, 0, .1) !important;
                    }

                    .transition-transform:hover {
                        transform: scale(1.03);
                    }

                    .max-width-600 {
                        max-width: 600px;
                    }

                    .line-clamp-3 {
                        display: -webkit-box;
                        -webkit-line-clamp: 3;
                        -webkit-box-orient: vertical;
                        overflow: hidden;
                    }
                </style>

                <script>
                    function calculateTotals() {
                        let grandTotal = 0;

                        document.querySelectorAll('.product-row').forEach(row => {
                            let select = row.querySelector('.product-select');
                            let quantityInput = row.querySelector('.quantity-input');
                            let totalInput = row.querySelector('.product-total-price');

                            let selectedOption = select.options[select.selectedIndex];
                            let price = (selectedOption && selectedOption.value !== "") ? parseFloat(selectedOption.getAttribute('data-price')) : 0;
                            let quantity = parseFloat(quantityInput.value) || 0;

                            let rowTotal = price * quantity;
                            totalInput.value = rowTotal > 0 ? rowTotal.toFixed(2) : '0.00';

                            grandTotal += rowTotal;
                        });

                        document.getElementById('grand-total').innerText = grandTotal.toFixed(2);
                        document.getElementById('total_price_input').value = grandTotal.toFixed(2);
                    }

                    document.getElementById('showOrderFormBtn').addEventListener('click', function() {
                        var formContainer = document.getElementById('orderFormContainer');
                        formContainer.classList.remove('d-none');
                        calculateTotals();

                        setTimeout(() => {
                            formContainer.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }, 100);
                    });

                    document.getElementById('add-product').addEventListener('click', function() {
                        let container = document.getElementById('products-container');
                        let rows = container.querySelectorAll('.product-row');

                        let firstRow = rows[0];
                        let newRow = firstRow.cloneNode(true);

                        newRow.querySelector('.product-select').value = "";
                        newRow.querySelector('.quantity-input').value = "1";
                        newRow.querySelector('.product-total-price').value = "0.00";

                        container.appendChild(newRow);
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
                        if (e.target.classList.contains('remove-row') || e.target.closest('.remove-row')) {
                            let targetBtn = e.target.classList.contains('remove-row') ? e.target : e.target.closest('.remove-row');
                            if (document.querySelectorAll('.product-row').length > 1) {
                                targetBtn.closest('.product-row').remove();
                                calculateTotals();
                            } else {
                                alert("يجب اختيار منتج واحد على الأقل في الطلب.");
                            }
                        }
                    });
                </script>
            </div>
        </div>
    </div>
@endsection
