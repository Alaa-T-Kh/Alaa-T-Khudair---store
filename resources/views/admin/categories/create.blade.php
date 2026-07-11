@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-dark text-white py-3">
                <h5 class="mb-0 card-title fs-6">
                    <i class="fa fa-folder-plus me-2"></i> إضافة صنف جديد
                </h5>
            </div>

            <div class="card-body p-4">
                <form action="{{ url('categories/store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold text-secondary">اسم الصنف الجديد</label>
                        <input type="text" class="form-control form-control-lg fs-6" id="name" name="name"
                            placeholder="أدخل اسم الصنف هنا..." required>
                    </div>

                    <hr class="text-muted my-4">

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ url('categories') }}" class="btn btn-light px-4">إلغاء</a>
                        <button type="submit" class="btn btn-success text-white px-5 fw-bold">
                            <i class="fa fa-save me-1"></i> حفظ الصنف
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
