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
                <h3 class="card-title">Create Admin </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form method="POST" action="{{route('admins.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="admin_name">Name </label>
                        <input type="text" value="{{old('admin_name')}}" class="form-control" name="admin_name" id="admin_name" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="admin_email">Email </label>
                        <input type="email" class="form-control" value="{{old('admin_email')}}" id="admin_email" name="admin_email"
                            placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="mobile">Moblie</label>
                        <input type="tel" class="form-control" id="moblie" value="{{old('moblie')}}" name="moblie"
                            placeholder="Enter moblie">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Admin image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file"  class="custom-file-input" name="admin_image" id="admin_image">
                                <label class="custom-file-label" for="admin_image">Choose image</label>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="admin_password">Password</label>
                        <input type="password" class="form-control" name="admin_password" id="admin_password"
                            placeholder="Password">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </div>
@endsection
@section('script')
<script src="cms/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
    $(function () {
      bsCustomFileInput.init();
    });
    </script>
@endsection
