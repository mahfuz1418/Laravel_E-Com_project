@extends('home.layouts.templete')
@section('main-content')
<div class="fashion_section">
   <div id="main_slider" class="carousel slide" data-ride="carousel">
       <div class="carousel-item active">
           <div class="container">
               <h1 class="text-center pt-4 fw-bold">
                   Final Step To place Order
               </h1>
               <div class="fashion_section_2">
                   <div class="row justify-content-center">
                       <div class="col-lg-4 col-sm-4 ">
                           <div class="box_main">
                              <h3>Product Will Send To-</h3>
                              <ul class="bg-light p-3">
                                 <li>Phone No - {{ $shipping_address->mobile }}</li>
                                 <li>City - {{ $shipping_address->city }}</li>
                                 <li>Village - {{ $shipping_address->village }}</li>
                                 <li>Postal - {{ $shipping_address->postal }}</li>
                              </ul>
                           </div>
                     
                       </div>
                       <div class="col-lg-8 col-sm-8 ">
                        <div class="box_main">
                           <div class="table-responsive text-nowrap">
                              <table class="table">
                                  <thead>
                                      <tr>
                                          <th>SL No.</th>
                                          <th>Product Name</th>
                                          <th>Product Image </th>
                                          <th>Quantity</th>
                                          <th>Total Price</th>
   
                                      </tr>
                                  </thead>
                                  <tbody class="table-border-bottom-0">
                                   @php
                                      $total = 0;
                                   @endphp
                                      @foreach ($cart_items as $cart)
                                          @php
                                              $product_name = App\Models\Product::where('id', $cart->product_id)->value('product_name');
                                              $product_img = App\Models\Product::where('id', $cart->product_id)->value('product_img');
                                          @endphp
                                          <tr>
                                              <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                  <strong>{{ $loop->iteration }}</strong></td>
                                              <td>{{ $product_name }}</td>
                                              <td><img src="{{ asset($product_img) }}" alt="" style="height: 40px"></td>
                                              <td>{{ $cart->quantity }}</td>
                                              <td>{{ $cart->price }}</td>
                                          </tr>
                                          @php
                                             $total += $cart->price;
                                          @endphp
                                      @endforeach
   
                                      <tr>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td > Total =</td>
                                         <td>{{ $total }}</td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                        </div>
                        
                    </div>
                   </div>
               </div>
               <div class="row justify-content-end">
                  <form action="" method="post">
                     <button type="submit" class="btn btn-danger btn-sm ">Cancel Order</button>
                  </form>
                  <form action="{{ route('placeorder') }}" method="post">
                     @csrf
                     <button type="submit" class="btn btn-info btn-sm mr-3 ml-2">Place Order</button>
                  </form>
               </div>
           </div>
       </div>
   </div>
</div>

@endsection