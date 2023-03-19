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
                    <h3 class="card-title">Copmlaint Or Suggestion All</h3>

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

                <div class="card-body table-responsive p-1">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>student_image</th>
                                <th>student_number</th>
                                <th>student_name</th>
                                <th>student_email</th>
                                <th>urgent</th>
                                <th>type</th>
                                <th>status</th>
                                <th>title</th>
                                <th>message</th>
                                <th>closed_date</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $da)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td> <img style="width: 60px;height: 60px;" class="img-circle img-bordered-sm"
                                            src="{{ Storage::url($da->image) }} " alt="image"></td>
                                    <td>{{ $da->student_id }}</td>
                                    <td>{{ $da->student_name }}</td>
                                    <td>{{ $da->student_email }}</td>

                                    <td>
                                        @if ($da->urgent == 1)
                                            <span style="color:green; font-weight: bold">urgent</span>
                                        @else
                                            <span style="color:rgb(234, 15, 15); font-weight: bold"> Not urgent</span>
                                        @endif
                                    </td>
                                    <td style="font-weight: bold">{{ $da->type }}</td>
                                    <td>
                                        @if ($da->status == 'open')
                                            <span
                                                style="color:rgb(234, 15, 15); font-weight: bold">{{ $da->status }}</span>
                                        @else
                                            <span style="color:green; font-weight: bold">{{ $da->status }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $da->title }}</td>
                                    <td>{{ $da->message }}</td>
                                    <td>
                                        @if (!is_null($da->closed_date))
                                            <span style="font-weight: bold">{{ $da->closed_date }}</span>
                                        @else
                                            <span style="color:rgb(234, 15, 15); font-weight: bold">No date</span>
                                        @endif
                                    </td>
                                    <td class="td-delete">
                                        <a href="{{route('complaints.edit',$da->id)}}">response</a>
                                        @if ($da->status == "open")
                                        <button type="button" onclick="closed({{$da->id}})" class="btn-delete">closed</button>

                                        @else
                                        <button type="button" disabled class="btn-delete" style="color: rgb(131, 129, 129);">closed</button>

                                        @endif
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
    <script>
        function closed(id) {
            axios.put(`/cms/admin/complaints/${id}/closed`,{
                status:"open"
            }).then((response) => {
                Swal.fire({
                    position: 'center',
                    icon: response.data.icon,
                    title: response.data.message,
                    showConfirmButton: false,
                    timer: 1500
                });
            }).catch((error) => {
                Swal.fire({
                    position: 'center',
                    icon: error.response.data.icon,
                    title: error.response.data.message,
                    showConfirmButton: false,
                    timer: 1500
                });
            })
        }
    </script>
@endsection
{{-- @section('script')
    <script>
        function closed(id) {
            axios.put(`/cms/admin/complaints/${id}/closed`).then((response) => {
                Swal.fire({
                    position: 'center',
                    icon: response.icon,
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1500
                });
            }).catch((error) => {
                Swal.fire({
                    position: 'center',
                    icon: error.response.icon,
                    title: error.response.message,
                    showConfirmButton: false,
                    timer: 1500
                });
            })
        }
    </script>
@endsection --}}
