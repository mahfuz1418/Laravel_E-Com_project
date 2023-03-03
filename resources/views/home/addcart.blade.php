@extends('home.layouts.templete')
@section('main-content')
    <div class="container flex-grow-1 container-p-y pb-4">
        <!-- Basic Bootstrap Table -->
        <div class="card">
           @if (session()->has('message'))
               <div class="alert alert-success text-center">
                   {{ session()->get('message') }}
               </div>
           @endif
            <h5 class="card-header">Show your all cart information</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Product Image </th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                     @php
                        $total = 0;
                     @endphp
                        @forelse ($carts as $cart)
                            @php
                                $product_name = App\Models\Product::where('id', $cart->product_id)->value('product_name');
                                $product_img = App\Models\Product::where('id', $cart->product_id)->value('product_img');
                            @endphp
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $loop->iteration }}</strong></td>
                                <td>{{ $product_name }}</td>
                                <td><img src="{{ asset($product_img) }}" alt="" style="height: 50px"></td>
                                <td>{{ $cart->quantity }}</td>
                                <td>{{ $cart->price }}</td>
                                <td>
                                    <a href="{{ route('removeproduct', $cart->id) }}" class="btn btn-warning btn-sm">Remove</a>
                                </td>
                            </tr>
                            @php
                               $total += $cart->price;
                            @endphp
                        @empty
                            <tr>
                                <td class="text-danger">No Cart Added</td>
                            </tr>
                        @endforelse
                        @if ($total <= 0)
                            
                        @else    
                        <tr>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td > Total =</td>
                           <td>{{ $total }}</td>
                           <td>
                              <a href="{{ route('shippingaddress') }}" class="btn btn-sm btn-outline-info">Check Out Now</a>
                           </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
