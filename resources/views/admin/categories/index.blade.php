@extends('layouts.admin')
@section('content')
    <div class="py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0">قائمة الأصناف</h3>
            <a href="{{ url('categories/create') }}" class="btn btn-success">
                <i class="fa fa-plus me-1"></i> إضافة صنف جديد
            </a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">اسم الصنف</th>
                    <th scope="col">الاحداث</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ url('categories/delete/' . $category->id) }}" class="btn btn-danger">حذف</a>
                            <a href="{{ url('categories/edit/' . $category->id) }}" class="btn btn-info">تعديل</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
@endsection
