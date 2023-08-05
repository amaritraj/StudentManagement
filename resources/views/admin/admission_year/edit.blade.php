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
                      <p>Edit Admission Year</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                  <center><h6 class="card-title">Edit Admission Year Form</h6></center>
                        {{--  value="{{ $profileData->formno }}"--}}

                <form method="POST" action="{{ route('year.update', $yearedit->id) }}" class="forms-sample">
                        @csrf

                    <div class="row mb-3">
                        <label for="yearname" class="col-sm-3 col-form-label">Admission Year</label>
                        <div class="col-sm-9">
                            <input type="text" name="year_name" value="{{ $yearedit->year_name }}" class="form-control" id="yearname">
                            @error('year_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary waves-effect waves-light me-2">Update</button>
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



