@extends('admin.admin_dashboard')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

<div class="page-content">

    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="position-relative">
            <figure class="overflow-hidden mb-0 d-flex justify-content-center">
                <img src="{{ asset('upload/profile_bg_1.jpg')}}" class="rounded-top" width="1560px" height="370px" alt="profile cover">
            </figure>
            <div class="d-flex justify-content-between align-items-center position-absolute top-90 w-100 px-2 px-md-4 mt-n4">
              <div>
                <img class="wd-70 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/user_photo.jpg') }}" alt="profile">
                <span class="h4 ms-3 text-dark">{{ $profileData->name }}</span>
              </div>

              <div class="d-none d-md-block">
                <button class="btn btn-primary btn-icon-text">
                  <i data-feather="edit" class="btn-icon-prepend"></i> Edit profile
                </button>
              </div>

            </div>
          </div>

            {{-- Menu Section start --}}
          <div class="d-flex justify-content-center p-3 rounded-bottom">
            <ul class="d-flex align-items-center m-0 p-0">
              <li class="d-flex align-items-center active">
                <i class="me-1 icon-md text-primary" data-feather="columns"></i>
                <a class="pt-1px d-none d-md-block text-primary" href="#">Timeline</a>
              </li>
              <li class="ms-3 ps-3 border-start d-flex align-items-center">
                <i class="me-1 icon-md" data-feather="user"></i>
                <a class="pt-1px d-none d-md-block text-body" href="#">About</a>
              </li>
            </ul>
          </div>
          {{-- Menu Section end --}}
        </div>
      </div>
    </div>
    {{-- Bannar and Menu section end --}}

    <div class="row profile-body">
      <!-- left wrapper start -->
      <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">

        <div class="card rounded">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-2">

                <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                    <div class="d-flex align-items-center hover-pointer">
                      <img class="wd-100 ht-100 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/user_photo.jpg') }}" alt="profile">
                      <div class="ms-2">
                        <span class="h4 ms-3"> {{ $profileData->username }}</span>
                      </div>
                    </div>
                </div>
            </div>

            <h6 class="card-title mb-0">About</h6>
            <br>
            <p>Hi! I'm Amiah the Senior UI Designer at NobleUI. We hope you enjoy the design and quality of Social.</p>
            <div class="mt-3">
              <label class="tx-14 fw-bolder mb-0 text-uppercase">Name : {{ $profileData->name }}</label>
            </div>
            <div class="mt-3">
              <label class="tx-14 fw-bolder mb-0 text-lowercase">Email : {{ $profileData->email }}</label>
            </div>
            <div class="mt-3">
              <label class="tx-14 fw-bolder mb-0 text-uppercase">Phone : {{ $profileData->phone }}</label>
            </div>
            <div class="mt-3">
              <label class="tx-14 fw-bolder mb-0 text-uppercase">Course Name :</label>
              <p class="tx-14 fw-bolder mb-0 text-muted">{{ $profileData->coursename }}</p>
            </div>
            <div class="mt-3">
                <label class="tx-14 fw-bolder mb-0 text-uppercase">Course Fee : {{ $profileData->coursefee }}</label>
            </div>
            <div class="mt-3">
                <label class="tx-14 fw-bolder mb-0 text-uppercase">Role : {{ $profileData->role }}</label>
            </div>
            <div class="mt-3">
                <label class="tx-14 fw-bolder mb-0 text-uppercase">Status : {{ $profileData->status }}</label>
            </div>

            <div class="mt-3 d-flex social-links">
              <a href="#" class="btn btn-icon border btn-xs me-2">
                <i data-feather="facebook"></i>
              </a>
              <a href="#" class="btn btn-icon border btn-xs me-2">
                <i data-feather="youtube"></i>
              </a>
              <a href="#" class="btn btn-icon border btn-xs me-2">
                <i data-feather="twitter"></i>
              </a>
            </div>

          </div>
        </div>
        {{-- About Section End --}}
      </div>
      <!-- left wrapper end -->


      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="card rounded">
              <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                  <div class="d-flex align-items-center">
                    <div class="ms-2">
                      <p>Admin Profile Change Password</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                  {{-- <h6 class="card-title">Password Change Form</h6> --}}

                <form method="POST" action="{{ route('admin.update.password') }}" class="forms-sample">
                        @csrf

                    <div class="row mb-3">
                        <label for="exampleInputOldPassword" class="form-label">Old Password</label>
                        <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" autocomplete="off">
                        @error('old_password')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <label for="exampleInputNewPassword" class="form-label">New Password</label>
                        <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" autocomplete="off">
                        @error('new_password')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <label for="exampleInputConNewPassword" class="form-label">Confirm New Password</label>
                        <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation" autocomplete="off">

                    </div>

                    <button type="submit" class="btn btn-primary me-2">Save Password</button>
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


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js">
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch (type) {
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
        }
    @endif
</script>


@endsection



