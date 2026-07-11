@extends('layouts.admin')

@section('content')
    <div class="py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0">قائمة الطلبات</h3>
            <a href="{{ route('orders.create') }}" class="btn btn-success">
                <i class="fa fa-plus me-1"></i> إضافة طلب جديد
            </a>
        </div>

        <table class="table table-bordered align-middle text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th style="width: 20%;">اسم الزبون</th>
                    <th style="width: 50%;">تفاصيل الطلبات (المنتج × الكمية × السعر = الإجمالي)</th>
                    <th style="width: 15%;">المجموع الكلي</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="fw-bold align-middle">{{ $order->customer_name }}</td>
                        <td>
                            <table class="table table-sm mb-0">
                                @foreach ($order->products as $product)
                                    <tr>
                                        <td><span class="badge bg-info text-dark">{{ $product->name }}</span></td>
                                        <td>{{ $product->pivot->quantity }} قطعة</td>
                                        <td>{{ number_format($product->pivot->price, 2) }}</td>
                                        <td class="fw-bold">
                                            {{ number_format($product->pivot->quantity * $product->pivot->price, 2) }}
                                        </td>

                                    </tr>
                                @endforeach
                            </table>
                        </td>
                        <td class="align-middle fw-bold text-dark fs-5">
                            {{ number_format(
                                $order->products->sum(function ($product) {
                                    return $product->pivot->quantity * $product->pivot->price;
                                }),
                                2,
                            ) }}
                        </td>
                        <td class="align-middle">
                            <a href="{{ url('orders/edit/' . $order->id) }}" class="btn btn-sm btn-info">تعديل</a>
                            <a href="{{ url('orders/delete/' . $order->id) }}" class="btn btn-sm btn-danger">حذف</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $orders->links() }}
    </div>
@endsection
