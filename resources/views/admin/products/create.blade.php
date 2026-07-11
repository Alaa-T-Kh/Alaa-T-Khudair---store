@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-dark text-white py-3">
                <h5 class="mb-0 card-title fs-6">
                    <i class="fa fa-plus-circle me-2"></i> إضافة منتج جديد
                </h5>
            </div>

            <div class="card-body p-4">
                <form action="{{ url('products/store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold text-secondary">اسم المنتج</label>
                        <input type="text" class="form-control form-control-lg fs-6" id="name" name="name"
                            placeholder="أدخل اسم المنتج هنا..." required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="quantity" class="form-label fw-bold text-secondary">الكمية المتاحة</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="0"
                                required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label fw-bold text-secondary">السعر</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="price" name="price" step="0.01"
                                    placeholder="0.00" required>
                                <span class="input-group-text">شيكل</span>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label fw-bold text-secondary">تصنيف المنتج</label>
                        <select class="form-select form-control" name="category_id" id="category_id" required>
                            <option value="" selected disabled>-- اختر الصنف المناسب --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label fw-bold text-secondary">وصف المنتج</label>
                        <textarea class="form-control" id="description" name="description" rows="4"
                            placeholder="اكتب وصفاً تفصيلياً للمنتج الجديد..."></textarea>
                    </div>

                    <hr class="text-muted my-4">

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ url('products') }}" class="btn btn-light px-4">إلغاء</a>
                        <button type="submit" class="btn btn-success text-white px-5 fw-bold">
                            <i class="fa fa-save me-1"></i> حفظ المنتج
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
