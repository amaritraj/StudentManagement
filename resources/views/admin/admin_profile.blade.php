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
                <span class="h4 ms-3 text-dark">{{ $profileData->name }}</span>
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
                      <p>Edit User Profile</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                  <h6 class="card-title">Profile Add Or Edit Form</h6>

                <form method="POST" action="{{ route('admin.profile.store') }}" class="forms-sample" enctype="multipart/form-data">
                        @csrf

                    <div class="row mb-3">
                        <label for="exampleInputFormNo" class="col-sm-3 col-form-label">Admission From No</label>
                        <div class="col-sm-9">
                            <input type="number" name="formno" class="form-control" id="exampleInputFormNo" placeholder="Course Fee" autocomplete="off" value="{{ $profileData->formno }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" id="exampleInputUsername2" placeholder="Name" autocomplete="off" value="{{ $profileData->name }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" name="username" class="form-control" id="exampleInputUsername2" placeholder="User Name" autocomplete="off" value="{{ $profileData->username }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" class="form-control" id="exampleInputEmail2" autocomplete="off" placeholder="Email" value="{{ $profileData->email }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                        <div class="col-sm-9">
                            <input type="number" name="phone" class="form-control" id="exampleInputMobile" placeholder="Mobile number" autocomplete="off" value="{{ $profileData->phone }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="exampleInputcoursename2" class="col-sm-3 col-form-label">Course Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="coursename" class="form-control" id="exampleInputcoursename2" placeholder="Course Name" autocomplete="off" value="{{ $profileData->coursename }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="exampleInputCourseFee" class="col-sm-3 col-form-label">Course Fee</label>
                        <div class="col-sm-9">
                            <input type="number" name="coursefee" class="form-control" id="exampleInputCourseFee" placeholder="Course Fee" autocomplete="off" value="{{ $profileData->coursefee }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="formFile" class="col-sm-3 col-form-label">Photo Upload</label>
                        <div class="col-sm-9">
                            <input type="file" name="photo" class="form-control" id="image">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="formFile2" class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <img id="showImage" class="wd-100 ht-100 rounded" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/user_photo.jpg') }}" alt="profile">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Save Changes</button>
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


<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});

    // @if (Session::has('success'))
    //     toastr.success("{{ session('success')}}")
    // @endif

</script>

@endsection



