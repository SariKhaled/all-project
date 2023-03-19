@extends('cms.parent')
@section('style')
    <style>
        .td-delete {
            display: flex;
            column-gap: 5px
        }

        .btn-delete {
            color: red;
            background-color: transparent;
            border: none;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Admin All</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Admin Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Moblie</th>
                                <th>Create_at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                                <tr id="admin_{{$admin->id}}">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td> <img style="width: 60px;height: 60px;" class="img-circle img-bordered-sm" src="{{Storage::url($admin->image)}}" alt="admins image"></td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>

                                    <td>
                                        @if ($admin->moblie)
                                            <span style="color: green; font-weight:bold ">{{ $admin->moblie }}</span>
                                        @else
                                            <span style="color: rgb(230, 11, 11); font-weight:bold ">No moblie</span>
                                        @endif

                                    </td>
                                    <td>{{ $admin->created_at }}</td>
                                    <td class="td-delete">
                                        <a href="{{ route('admins.edit', $admin->id) }}">edit</a>
                                        {{-- <form method="post" action="{{ route('admins.destroy', $admin->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn-delete" type="submit">delete</button>

                                        </form> --}}
                                        <button type="button" class="btn-delete" onclick="deleteAdmin({{$admin->id}})">delete</button>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
@section('script')
    <script>
        function deleteAdmin(id) {
            axios.delete('/cms/admin/admins/' + id)
                .then(function(response) {
                    document.getElementById(`admin_${id}`).remove();
                    Swal.fire({
                        icon: 'success',
                        title: response.data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                })
                .catch(function(error) {
                    console.log(error);
                    Swal.fire({
                        icon: 'error',
                        title: error.response.data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                });
        }
    </script>
@endsection
