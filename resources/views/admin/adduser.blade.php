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
                      <p>Edit User Profile</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                  <h6 class="card-title">Profile Add Or Edit Form</h6>

                <form method="POST" action="{{ route('admin.addstore') }}" class="forms-sample" enctype="multipart/form-data">
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



