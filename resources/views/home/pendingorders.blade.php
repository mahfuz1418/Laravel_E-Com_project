@extends('home.layouts.user_profile_templete')
@section('user-content')
    @if (session()->has('message'))
        <div class="alert alert-success text-center">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-12 col-sm-12 ">
            <div class="box_main">
                <h4 class="text-center">Pending Orders</h4>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>SL No.</th>
                                <th>Product Name</th>
                                <th>Product Image </th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($pending_orders as $order)
                                @php
                                    $product_name = App\Models\Product::where('id', $order->product_id)->value('product_name');
                                    $product_img = App\Models\Product::where('id', $order->product_id)->value('product_img');
                                @endphp
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $loop->iteration }}</strong>
                                    </td>
                                    <td>{{ $product_name }}</td>
                                    <td><img src="{{ asset($product_img ) }}" alt="" style="height: 40px"></td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ $order->total_price }}</td>
                                    <td>{{ $order->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
