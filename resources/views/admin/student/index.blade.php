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
                <p><a href="{{ route('student.create') }}" class="btn btn-primary"> Add Student</a></p>
                {{-- <p class="text-muted mb-3">Read the <a href="#" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> --}}
                <div class="table-responsive">
                <table id="dataTableExample" class="table fs-6">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>From No</th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Mobile</th>
                        <th>Course Name</th>
                        <th>Course Fee</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($students as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->formno }}</td>
                        <td>{{ $user->name }}</td>
                        {{-- <td><img class="wd-60 ht-60 rounded-circle" src="{{ (!empty($user->photo)) ? url('upload/student/'.$user->photo) : url('upload/user_photo.jpg') }}" alt="profile"></td> --}}
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->coursename }}</td>
                        <td>{{ $user->coursefee }}</td>
                        <td>
                            <a href="{{ route('student.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('student.show', $user->id) }}" class="btn btn-primary">Show All</a>
                            <form action="{{ route('student.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i>Delate</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
                {{-- {!! $results->links() !!} --}}
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



