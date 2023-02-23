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
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_name">Product Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="product_name" name="product_name" value="" />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_price">Product Price</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="price" name="price" placeholder="100" />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_quantity">Product Quantity</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="product_quantity" name="product_quantity" placeholder="2" />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_short_des">Product Short Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="product_short_des" name="product_short_des"  cols="30" rows="3"></textarea>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_long_des">Product Long Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="product_long_des" name="product_long_des"  cols="30" rows="6"></textarea>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="select_category" >Select Category</label>
                <div class="col-sm-10">
                    <select id="select_category" class="form-select" name="product_category_id" >
                        <option value="0">Select Category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                      </select>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="select_subcategory" >Select Sub Category</label>
                <div class="col-sm-10">
                    <select id="sub_category" class="form-select" name="product_subcategory_id">
                        <option value=""></option>
                      </select>
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
                  <button type="submit" class="btn btn-primary">Edit Product</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        // category ajax
        $('#select_category').change(function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '/admin/product/subcategorylist',
                    data: {
                        category_id: category_id
                    },
                    success: function(data) {
                        $("#sub_category").html(data);
                    }
                });
            }
        })
    })
</script>

@endsection