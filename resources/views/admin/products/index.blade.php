@extends('layouts.admin')
@section('content')
    <div class="py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0">قائمة المنتجات</h3>
            <a href="{{ route('products.create') }}" class="btn btn-success">
                <i class="fa fa-plus me-1"></i> إضافة منتج جديد
            </a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">اسم المنتج</th>
                    <th scope="col">الصنف</th>
                    <th scope="col">السعر</th>
                    <th scope="col">الكمية</th>
                    <th scope="col">الاحداث</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            <a href="{{ url('products/delete/' . $product->id) }}" class="btn btn-danger">حذف</a>
                            <a href="{{ url('products/edit/' . $product->id) }}" class="btn btn-info">تعديل</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
@endsection
