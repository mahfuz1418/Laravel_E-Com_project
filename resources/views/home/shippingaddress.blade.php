@extends('home.layouts.templete')
@section('main-content')
    <div class="fashion_section">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-item active">
                <div class="container">
                    <h1 class="text-center pt-4 fw-bold">
                        Provide Your Shipping Information
                    </h1>
                    <div class="fashion_section_2">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 col-sm-8 ">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (session()->has('message'))
                                    <div class="alert alert-success text-center">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                <div class="box_main">
                                    <form action="{{ route('addshippingaddress') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="mobile">Mobile Number</label>
                                            <input type="number" class="form-control" name="mobile" id="mobile">
                                        </div>
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" name="city" id="city">
                                        </div>
                                        <div class="form-group">
                                            <label for="village">Village</label>
                                            <input type="text" class="form-control" name="village" id="village">
                                        </div>
                                        <div class="form-group">
                                            <label for="postal_code">Postal Code</label>
                                            <input type="number" class="form-control" name="postal" id="postal_code">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-info">Next</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
