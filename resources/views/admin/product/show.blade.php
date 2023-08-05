@extends('admin.admin_dashboard')

@section('admin')


<div class="page-content">


    <div class="row profile-body">
      <!-- left wrapper start -->
      <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
        <a href="{{ route('product.index') }}" class="btn btn-primary">Product List</a>

        <div class="card rounded">
          <div class="card-body">

            <h6 class="card-title mb-0">Product : {{ $product->title }}</h6>
            <br>
            <p>Product Description : {{ $product->description }} .</p>
            <div class="mt-3">
              <label class="tx-14 fw-bolder mb-0 text-uppercase">Title : {{ $product->title }}</label>
            </div>
            <div class="mt-3">
              <label class="tx-14 fw-bolder mb-0 text-lowercase">Price : {{ $product->price }}</label>
            </div>
            <div class="mt-3">
              <label class="tx-14 fw-bolder mb-0 text-uppercase">Product Code : {{ $product->product_code }}</label>
            </div>
            <div class="mt-3">
              <label class="tx-14 fw-bolder mb-0 text-uppercase"><img src="/backend/assets/images/student/{{ $product->image }}" width="40%" alt=""></label>
            </div>
          </div>
        </div>
        {{-- About Section End --}}
      </div>
      <!-- left wrapper end -->
        </div>
      </div>
      <!-- right wrapper end -->
    </div>
</div>



@endsection



