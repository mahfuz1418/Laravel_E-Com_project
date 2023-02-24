@extends('admin.layouts.templete')
@section('page-title')
    Edit Products - Single E-Commmarce
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Update Product Image</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
      <!-- Basic Layout -->
      <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Update Product Image</h5>
            <small class="text-muted float-end">Update Image</small>
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
            <form action="{{ route('updateproductimg') }}" method="post" enctype="multipart/form-data">
              @csrf 
              <input type="hidden" name="id" value="{{ $products->id }}">
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_image">Product Image</label>
                <div class="col-sm-10">
                    <img style="height: 400px" src="{{ asset($products->product_img) }}" alt="">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_image">Product Image</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file" id="product_image" name="product_img" />
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Update Product Image</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection