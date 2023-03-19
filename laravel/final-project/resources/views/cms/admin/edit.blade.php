@extends('cms.parent')
@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> validation!</h5>
                @foreach ($errors->all() as $error)
                    <ul>

                        <li>{{ $error }}</li>

                    </ul>
                @endforeach
            </div>
        @endif
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Admin </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {{-- <form method="POST" action="{{ route('admins.update', $admins->id) }}"> --}}
            <form>
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="admin_name">Name </label>
                        <input type="text" class="form-control" name="admin_name" id="admin_name"
                            value=" {{ $admins->name }}" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="admin_email">Email </label>
                        <input type="email" class="form-control" value="{{ $admins->email }}" id="admin_email"
                            name="admin_email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="mobile">Moblie</label>
                        <input type="tel" class="form-control" id="moblie" value="{{ $admins->moblie }}"
                            name="moblie" placeholder="Enter moblie">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="button" onclick="updateAdmin({{ $admins->id }})"
                        class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </div>
@endsection
@section('script')
    <script>
        function updateAdmin(id) {
            axios.put(`/cms/admin/admins/${id}`, {
                    admin_email: document.getElementById('admin_email').value,
                    admin_name: document.getElementById('admin_name').value,
                    moblie: document.getElementById('moblie').value
                })
                .then((response) => {
                    Swal.fire({
                        icon: "success",
                        title: response.data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    window.location.href = '/cms/admin/admins'
                })
                .catch((error)=>{
                    Swal.fire({
                        icon: "error",
                        title: error.response.data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });

                }

                )
        }

        function showMessage(icon, message) {
            Swal.fire({
                icon: icon,
                title: message,
                showConfirmButton: false,
                timer: 1500
            });
        }
    </script>
@endsection
