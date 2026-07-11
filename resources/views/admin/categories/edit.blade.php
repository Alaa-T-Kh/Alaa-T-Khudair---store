@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-dark text-white py-3">
                <h5 class="mb-0 card-title fs-6">
                    <i class="fa fa-folder-open me-2"></i> تعديل بيانات الصنف: {{ $category->name }}
                </h5>
            </div>

            <div class="card-body p-4">
                <form action="{{ url('categories/update/' . $category->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold text-secondary">اسم الصنف الجديد</label>
                        <input type="text" class="form-control form-control-lg fs-6" id="name" name="name"
                            value="{{ $category->name }}" placeholder="أدخل اسم الصنف هنا..." required>
                    </div>

                    <hr class="text-muted my-4">

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ url('categories') }}" class="btn btn-light px-4">إلغاء</a>
                        <button type="submit" class="btn btn-info text-white px-5 fw-bold">
                            <i class="fa fa-save me-1"></i> حفظ التعديلات
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
