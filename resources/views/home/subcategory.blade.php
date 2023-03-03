@extends('home.layouts.templete')
@section('main-content')
    <div class="fashion_section">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-item active">
                <div class="container">
                    <h1 class="fashion_taital">{{ $subcategory->subcategory_name }} - ({{ $subcategory->product_count }})
                    </h1>
                    <div class="fashion_section_2">
                        <div class="row">
                            @forelse($products as $product)
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
