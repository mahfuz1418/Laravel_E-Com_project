@extends('home.layouts.templete')
@section('main-content')
    <div class="container">
        <div class="row">
            <h1 class="fashion_taital pt-4"></h1>
            <div class="col-lg-4">
                <div class="box_main">
                    <div class="tshirt_img"><img src="{{ asset($product->product_img) }}"></div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="box_main">
                    <div>
                        <h4 class="shirt_text py-2 text-left">{{ $product->product_name }}</h4>
                        <p class="price_text text-left">Price <span style="color: #262626;">$ {{ $product->price }}</span>
                        </p>
                        <p class="lead py-2">{{ $product->product_long_des }}</p>
                        <ul class="bg-light p-3 my-2">
                            <li>Category - {{ $product->product_category_name }}</li>
                            <li>Sub Category - {{ $product->product_subcategory_name }}</li>
                            <li>Product Quantity - {{ $product->product_quantity }}</li>
                        </ul>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="btn_main">
                        <form action="{{ route('addproductcart') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            <label for="quantity">How many pices?</label>
                            <input name="quantity" class="form-control" min="1" type="number" placeholder="1">
                            <button class="btn btn-warning mt-3" type="submit">Add To Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div id="main_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-item active">
                    <div class="container">
                        <h1 class="fashion_taital">Related Products</h1>
                        <div class="fashion_section_2">
                            <div class="row">
                                @forelse($related_products as $product)
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">{{ $product->product_name }}</h4>
                                            <p class="price_text">Price <span style="color: #262626;">$
                                                    {{ $product->price }}</span></p>
                                            <div class="tshirt_img"><img src="{{ asset($product->product_img) }}"></div>
                                            <div class="btn_main">
                                                <form action="{{ route('addproductcart') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <input type="hidden" name="quantity" value="1">
                                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                                    <button class="btn btn-warning mt-3 buy_bt" type="submit">Add To
                                                        Cart</button>
                                                </form>
                                                <div class="seemore_bt pt-4"><a
                                                        href="{{ route('singleproduct', [$product->id, $product->slug]) }}">See
                                                        More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
