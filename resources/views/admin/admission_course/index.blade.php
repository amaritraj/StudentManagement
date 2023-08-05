@extends('admin.admin_dashboard')

@section('admin')


<div class="page-content">

      <!-- middle wrapper start -->
      <div class="col-md-12 col-xl-12 middle-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h6 class="card-title">Admission Course List</h6>
                <p><a href="{{ route('course.create') }}" class="btn btn-primary"> Add Admission Course</a></p>
                {{-- <p class="text-muted mb-3">Read the <a href="#" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> --}}
                <div class="table-responsive">
                <table id="dataTableExample" class="table fs-6">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Course Name</th>
                        <th>Year Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @php($i = 1)
                    @foreach($coursname as $courselist)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $courselist->course_name }}</td>
                        <td>{{ $courselist->year->year_name }}</td>
                        <td>
                            <a href="{{ route('course.edit', $courselist->course_id) }}" class="btn btn-info" title="Edit Data">
                                  <i class="fa fa-edit"></i> &nbsp; Edit</a> &nbsp;&nbsp;
                            {{-- <a href="{{ route('course.destroy', $courselist->id) }}" class="btn btn-danger" title="Data Delate" onclick="return confirm('Are you sure to delete this.?')">
                                <i class="fa-solid fa-trash"></i> &nbsp; Delete</a> --}}
                                <a href="{{ route('course.destroy', $courselist->course_id) }}" class="btn btn-danger" title="Data Delate" onclick="confirmation(event)">
                                    <i class="fa-solid fa-trash"></i> &nbsp; Delete</a>
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

