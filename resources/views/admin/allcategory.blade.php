@extends('admin.layouts.templete')
@section('page-title')
    All Category - Single E-Commmarce
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Category</h4>
      <!-- Basic Bootstrap Table -->
      @if(session()->has('message'))
        <div class="alert alert-success text-center">
          {{ session()->get('message') }}
        </div>
      @endif
      <div class="card">
        <h5 class="card-header">Available Category Information</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Sub category </th>
                <th>Product</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @forelse ($categories as $category)
              <tr >
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $category->id }}</strong></td>
                <td>{{ $category->category_name }}</td>
                <td>{{ $category->subcategory_count }}</td>
                <td>{{ $category->product_count }}</td>
                <td>
                    <a href="{{ route('editcategory', $category->id ) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('deletecategory', $category->id ) }}" class="btn btn-warning">Delete</a>
                </td>
              </tr>  
              @empty
              <tr><td>No Category Added</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
      <!--/ Basic Bootstrap Table -->
</div>
@endsection