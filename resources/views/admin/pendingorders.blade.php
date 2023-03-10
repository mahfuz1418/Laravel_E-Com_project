@extends('admin.layouts.templete')
@section('page-title')
    Pending Orders - Single E-Commmarce
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Pending Orders</h4>
        @if (session()->has('message'))
            <div class="alert alert-success text-center">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="card">
            <h5 class="card-header">All pending orders information</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Shipping Address</th>
                            <th>Quantity</th>
                            <th>Total Bill Pay</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($pending_orders as $order)
                            @php
                                $product_name = App\Models\Product::where('id', $order->product_id)->value('product_name');
                                $product_img = App\Models\Product::where('id', $order->product_id)->value('product_img');
                            @endphp
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $order->user_id }}</strong>
                                </td>
                                <td>{{ $product_name }} </td>
                                <td><img style="height: 50px" src="{{ asset($product_img) }}" alt=""></td>
                                <td>
                                    <ul>
                                        <li>{{ $order->mobile }}</li>
                                        <li>{{ $order->city }}</li>
                                        <li>{{ $order->village }}</li>
                                        <li>{{ $order->postal }}</li>
                                    </ul>
                                </td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->total_price }}</td>
                                <td>
                                    <a href="{{ route('confirmorder', $order->id) }}"
                                        class="btn btn-success btn-sm">Confirm Now</a>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
