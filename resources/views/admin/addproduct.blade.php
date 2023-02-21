@extends('admin.layouts.templete')
@section('page-title')
    Add Products - Single E-Commmarce
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Add Product</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
      <!-- Basic Layout -->
      <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Add New Product</h5>
            <small class="text-muted float-end">Add Information</small>
          </div>
          <div class="card-body">
            <form>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_name">Product Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Electronics" />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_price">Product Price</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="product_price" name="product_price" placeholder="100" />
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
                    <select id="select_category" class="form-select" name="select_category">
                        <option>Select Category</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="select_subcategory" >Select Sub Category</label>
                <div class="col-sm-10">
                    <select id="select_subcategory" class="form-select" name="select_subcategory">
                        <option>Select Sub Category</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_image">Product Image</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file" id="product_image" name="product_image" />
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection