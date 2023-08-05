@extends('admin.admin_dashboard')

@section('admin')


<div class="page-content">

      <!-- middle wrapper start -->
      <div class="col-md-12 col-xl-12 middle-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h6 class="card-title">User List</h6>
                {{-- <p><a href="{{ route('admin.adduser') }}" type="button" class="btn btn-primary">Add New User</a></p> --}}
                {{-- <p class="text-muted mb-3">Read the <a href="#" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> --}}
                <div class="table-responsive">
                <table id="dataTableExample" class="table fs-6">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>From No</th>
                        <th>Name</th>
                        <th>User Name</th>
                        <th>Photo</th>
                        <th>E-mail</th>
                        <th>Mobile</th>
                        <th>Course Name</th>
                        <th>Course Fee</th>
                        <th>Role</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php ($i = 1) @endphp
                    @foreach($results as $user)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $user->formno }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td><img class="wd-60 ht-60 rounded-circle" src="{{ (!empty($user->photo)) ? url('upload/admin_images/'.$user->photo) : url('upload/user_photo.jpg') }}" alt="profile"></td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->coursename }}</td>
                        <td>{{ $user->coursefee }}</td>
                        <td><a href="#" class="btn btn-light">{{ $user->role }}</a></td>
                        <td> <a href="#" class="btn btn-info">{{ $user->status }}</a></td>
                        <td>
                            <a href="" class="btn btn-primary">Edit</a>
                            <a href="" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
                {!! $results->links() !!}
                </div>
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



