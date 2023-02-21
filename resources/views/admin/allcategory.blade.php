@extends('admin.layouts.templete')
@section('page-title')
    All Category - Single E-Commmarce
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Category</h4>
      <!-- Basic Bootstrap Table -->
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
              <tr >
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1</strong></td>
                <td>Jwellary</td>
                <td>12</td>
                <td>2</td>
                <td>
                    <a href="" class="btn btn-primary">Edit</a>
                    <a href="" class="btn btn-warning">Delete</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!--/ Basic Bootstrap Table -->
</div>
@endsection