@extends('admin.admin_dashboard')

@section('admin')


<div class="page-content">


    <div class="row profile-body">

      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="card rounded">
              <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                  <div class="d-flex align-items-center">
                    <div class="ms-2">
                        <a href="{{ route('product.index') }}" class="btn btn-primary">Product List</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input. <br><br>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                  <center><h6 class="card-title">Add Product</h6></center>
                        {{--  value="{{ $profileData->formno }}"--}}

                <form action="{{ route('product.store') }}" method="POST"  class="forms-sample"" enctype="multipart/form-data">
                        @csrf

                    <div class="row mb-3">
                        <label for="exampleInputFormNo" class="col-sm-3 col-form-label">Product Title</label>
                        <div class="col-sm-9">
                            <input type="text" name="title" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Product Price</label>
                        <div class="col-sm-9">
                            <input type="number" name="price" class="form-control" >
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Product Code</label>
                        <div class="col-sm-9">
                            <input type="number" name="product_code" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Product Description</label>
                        <div class="col-sm-9">
                            <textarea name="description" class="form-control" id="" cols="30" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Product Photo</label>
                        <div class="col-sm-9">
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                  </form>
              </div>
              {{-- fORM END --}}
            </div>
          </div>

        </div>
      </div>
      <!-- middle wrapper end -->

        </div>
      </div>
      <!-- right wrapper end -->
    </div>
</div>


@endsection



