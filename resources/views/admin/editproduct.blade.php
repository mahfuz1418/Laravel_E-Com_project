@extends('admin.layouts.templete')
@section('page-title')
    Edit Products - Single E-Commmarce
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Edit Product</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
      <!-- Basic Layout -->
      <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Product</h5>
            <small class="text-muted float-end">Edit Information</small>
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
          <div class="card-body">
            <form action="{{ route('updateproduct') }}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" value="{{  $product->id  }}">
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_name">Product Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $product->product_name }}" />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_price">Product Price</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_quantity">Product quantity</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="product_quantity" id="product_quantity" value="{{ $product->product_quantity }}">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_short_des">Product Short Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="product_short_des" name="product_short_des"  cols="30" rows="3">{{ $product->product_short_des }}</textarea>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_long_des">Product Long Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="product_long_des" name="product_long_des"  cols="30" rows="6">{{ $product->product_long_des }}</textarea>
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Update Product</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
