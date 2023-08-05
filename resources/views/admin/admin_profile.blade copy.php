@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">

    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="position-relative">
            <figure class="overflow-hidden mb-0 d-flex justify-content-center">
                <img src="{{ asset('upload/profile_bg_1.jpg')}}" class="rounded-top" width="1560px" height="370px" alt="profile cover">
                {{-- <img src="https://via.placeholder.com/1560x370"class="rounded-top" alt="profile cover"> --}}
            </figure>
            <div class="d-flex justify-content-between align-items-center position-absolute top-90 w-100 px-2 px-md-4 mt-n4">
              <div>
                <img class="wd-70 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/user_photo.jpg') }}" alt="profile">
                {{-- <img class="wd-70 rounded-circle" src="https://via.placeholder.com/100x100" alt="profile"> --}}
                <span class="h4 ms-3 text-dark">Amiah Burton</span>
              </div>


              <div class="d-none d-md-block">
                <button class="btn btn-primary btn-icon-text">
                  <i data-feather="edit" class="btn-icon-prepend"></i> Edit profile
                </button>
              </div>
            </div>
          </div>
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
        </div>
      </div>
    </div>

    <div class="row profile-body">
      <!-- left wrapper start -->
      <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">

        <div class="card rounded">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-2">

                <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                    <div class="d-flex align-items-center hover-pointer">
                      <img class="img-xs rounded-circle" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/user_photo.jpg') }}" alt="profile">
                      <div class="ms-2">
                        <p>Mike Popescu</p>
                      </div>
                    </div>
                </div>
            </div>

            <h6 class="card-title mb-0">About</h6>
            <br>
            <p>Hi! I'm Amiah the Senior UI Designer at NobleUI. We hope you enjoy the design and quality of Social.</p>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
              <p class="text-muted">November 15, 2015</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Lives:</label>
              <p class="text-muted">New York, USA</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
              <p class="text-muted">me@nobleui.com</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Website:</label>
              <p class="text-muted">www.nobleui.com</p>
            </div>
            <div class="mt-3 d-flex social-links">
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="github"></i>
              </a>
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="twitter"></i>
              </a>
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="instagram"></i>
              </a>
            </div>
          </div>
        </div>
        {{-- About Section End --}}
        <br>

        <div class="col-md-12 grid-margin mt-20">
            <div class="card rounded">
              <div class="card-body">
                <h6 class="card-title">Student Group List</h6>

                <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                  <div class="d-flex align-items-center hover-pointer">

                    <img class="img-xs rounded-circle" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/user_photo.jpg') }}" alt="profile">

                    {{-- <img class="img-xs rounded-circle" src="https://via.placeholder.com/37x37" alt=""> --}}
                    <div class="ms-2">
                      <p>Mike Popescu</p>
                      <p class="tx-11 text-muted">12 Mutual Friends</p>
                    </div>
                  </div>
                  <button class="btn btn-icon"><i data-feather="user-plus" data-bs-toggle="tooltip" title="Connect"></i></button>
                </div>

              </div>
            </div>
          </div>
          {{-- Group Student List end --}}




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
                    <img class="img-xs rounded-circle" src="{{ asset('upload/profile_bg_1.jpg')}}" alt="">
                    <div class="ms-2">
                      <p>Mike Popescu</p>
                      <p class="tx-11 text-muted">1 min ago</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <p class="mb-3 tx-14">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus minima delectus nemo unde quae recusandae assumenda.</p>
                <img class="img-fluid" src="{{ asset('upload/profile_bg_1.jpg')}}" alt="">
              </div>

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
