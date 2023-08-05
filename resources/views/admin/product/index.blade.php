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
                <p><a href="{{ route('product.create') }}" class="btn btn-primary"> Add Product</a></p> <br><br>

                {{-- @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif --}}

                <div class="table-responsive">
            <form action="{{ route('product.alldestroy') }}" method="POST"  class="forms-sample"" enctype="multipart/form-data">
                 @csrf
                <table id="dataTableExample table-striped ">
                    <thead>
                    <tr>
                        <th>*</th>
                        <th with=10%>SL</th>
                        <th with=10%>title</th>
                        <th with=10%>price</th>
                        <th with=10%>product_code</th>
                        <th with=40%>description</th>
                        <th with=10%>image</th>
                        <th with=10%>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if ($product->count()>0)
                            @foreach($product as $item)
                            <tr>
                                <td><input class="form-check-input" type="checkbox" name="ids[{{ $item->id }}]" value="{{ $item->id }}"></td>
                                <td with=10%>{{ $item->id }}</td>
                                <td with=10%>{{ $item->title }}</td>
                                <td with=10%>{{ $item->price }}</td>
                                <td with=10%>{{ $item->product_code }}</td>
                                <td width=40%>{{ $item->description }}</td>
                                <td width=10%><img src="/backend/assets/images/student/{{ $item->image }}" width="40%" alt=""></td>
                                <td with=10%>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        {{-- only Database Data Edit Not Photo Edit --}}
                                        <a href="{{ route('product.edit', $item->id) }}" type="button" class="btn btn-warning m-0">Edit</a>
                                        {{-- edit Data and Photo Succefully --}}
                                        <a href="{{ route('edit.product', $item->id) }}" type="button" class="btn btn-warning m-0">Edit Product</a>
                                        {{-- Delete Data and Photo Succefully --}}
                                        <a href="{{ route('delete.product', $item->id) }}" onclick="return confirm('Are you sure to Delete')" type="button" class="btn btn-denger m-0">Delete Product</a>
                                        {{-- Show Data and Photo Succefully --}}
                                        <a href="{{ route('product.show', $item->id) }}" type="button" class="btn btn-success m-0">Show</a>
                                        {{-- Delete only Data Not Photo --}}
                                        <a href="{{ route('product.singdestroy', $item->id) }}" class="btn btn-danger m-0">Delate</a>

                                        {{-- <a href="{{ route('product.destroy', $item->id) }}" type="button" class="btn btn-danger m-0" onsubmit="return confirm('Delete?')">Delate</a> --}}
                                        {{-- <form action="{{ route('product.destroy', $item->id) }}" method="POST" type="button" class="btn btn-danger m-0" onsubmit="return confirm('Delete?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger m-0">Delate</button>
                                        </form> --}}
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @else
                        <tr>
                            <td with=100% class="text-center" colspan="6">
                                <div class="alert alert-danger" role="alert">Product Not Found! </div>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                <input type="submit" value="Delete Users" class="btn btn-danger">
            </form>


                <br>
                {{-- {!! $product->onEachSide(1)->links('pagination::bootstrap-5') !!} --}}
                {!! $product->links() !!}

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



