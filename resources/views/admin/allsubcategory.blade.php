@extends('admin.layouts.templete')
@section('page-title')
    All Subcategory - Single E-Commmarce
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Sub Category</h4>
      <!-- Basic Bootstrap Table -->
      @if(session()->has('message'))
        <div class="alert alert-success text-center">
          {{ session()->get('message') }}
        </div>
      @endif
      <div class="card">
        <h5 class="card-header">Available Sub Category Information</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Sub Category Name</th>
                <th>Category Name</th>
                <th>Product</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @forelse ($subcategories as $subcategory)    
              <tr >
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $subcategory->id }}</strong></td>
                <td>{{ $subcategory->subcategory_name }}</td>
                <td>{{ $subcategory->category_name }}</td>
                <td>{{ $subcategory->product_count }}</td>
                <td>
                    <a href="{{ route('editsubcategory', $subcategory->id ) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('deletesubcategory', $subcategory->id ) }}" class="btn btn-warning">Delete</a>
                </td>
              </tr>
              @empty
                  
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
      <!--/ Basic Bootstrap Table -->
</div>
@endsection