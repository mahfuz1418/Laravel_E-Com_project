@extends('admin.layouts.templete')
@section('page-title')
    All Products - Single E-Commmarce
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Products</h4>
    @if(session()->has('message'))
        <div class="alert alert-success text-center">
          {{ session()->get('message') }}
        </div>
      @endif
      <!-- Basic Bootstrap Table -->
      <div class="card">
        <h5 class="card-header">Available Product Information</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Poduct Name</th>
                <th>Image</th>
                <th>Product Price</th>
                <th>Product Quantity</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @forelse($products as $product)
              <tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $loop->iteration }}</strong></td>
                <td>{{ $product->product_name }}</td>
                <td>
                  <img style=" height: 100px" src="{{ asset($product->product_img) }}" alt="">
                  <br>
                  <a href="{{ route('editproductimg', $product->id) }}" class="btn btn-primary mt-1">Update Image</a>
                </td>
                <td><i class="fa-solid fa-bangladeshi-taka-sign"></i> {{ $product->price  }} /= </td>
                <td>{{ $product->product_quantity }}</td>
                <td>
                    <a href="{{ route('editproduct', $product->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('deleteproduct', $product->id) }}" class="btn btn-warning">Delete</a>
                </td>
              </tr>
              @empty
                <tr><td class="text-danger text-center">No product inserted</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
      <!--/ Basic Bootstrap Table -->
</div>
@endsection