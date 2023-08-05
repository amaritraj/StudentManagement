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
                  <center><h6 class="card-title">Edit Product</h6></center>
                        {{--  value="{{ $profileData->formno }}"--}}
                <form action="{{ route('product.update', $product->id) }}" method="POST"  class="forms-sample"" enctype="multipart/form-data">
                        @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label for="exampleInputFormNo" class="col-sm-3 col-form-label">Product Title</label>
                        <div class="col-sm-9">
                            <input type="text" name="title" class="form-control" value="{{ $product->title }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Product Price</label>
                        <div class="col-sm-9">
                            <input type="number" name="price" class="form-control"  value="{{ $product->price }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Product Code</label>
                        <div class="col-sm-9">
                            <input type="number" name="product_code" class="form-control" value="{{ $product->product_code }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Product Description</label>
                        <div class="col-sm-9">
                            <textarea name="description" class="form-control" id="" cols="30" rows="10" >{{ $product->description }}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Product Photo</label>
                        <div class="col-sm-9">
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Product Old Photo</label>
                        <div class="col-sm-9">
                            <img src="/backend/assets/images/student/{{ $product->image }}" width="80px" alt="">
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



