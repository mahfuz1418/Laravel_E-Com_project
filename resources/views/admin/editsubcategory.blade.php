@extends('admin.layouts.templete')
@section('page-title')
    Edit Subcategory - Single E-Commmarce
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Edit Sub Category</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
      <!-- Basic Layout -->
      <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Sub Category</h5>
            <small class="text-muted float-end">Edit Information</small>
          </div>
          <div class="card-body">
            <form action="{{ route('updatesubcategory') }}" method="POST">
              @csrf
              <div class="row mb-3">
                <input type="hidden" name="subcat_id" value="{{ $subcategory_info->id }}">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Sub Category Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="basic-default-name" name="subcategory_name" value="{{ $subcategory_info->subcategory_name }}" />
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Update Sub Category</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection