<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Complaint Or Suggestion</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('cms/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition register-page">
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible" style="width: 70%; position: relative; top: 10px">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Validata!</h5>
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach

            </ul>

        </div>
    @endif
    <div style="width: 70%; position: relative; top:10px;">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h3"><b>Complaint Or Suggestion</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Complaint Or Suggestion</p>

                <form class="row" method="post" action="{{ route('complaints.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3 col-6">
                        <input type="text" class="form-control" value="{{old('student_name')}}" id="student_name" name="student_name"
                            placeholder="Full name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3 col-6">
                        <input type="number" class="form-control" value="{{old('student_number')}}" id="student_number" name="student_number"
                            placeholder="Number ">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3 col-6">
                        <input type="email" class="form-control" value="{{old('student_email')}}" id="student_email" name="student_email"
                            placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <div class="input-group">
                            <div class="custom-file col-12">
                                <input type="file" class="custom-file-input" name="student_image" id="student_image">
                                <label class="custom-file-label" for="student_image">Choose Image</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-9">

                        <div class="form-group">
                            <select class="custom-select" id="select" value="{{old('select')}}" name="select">
                                <option value="complaint">Complaint</option>
                                <option value="suggestion">Suggestion</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-2 col-3">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" value="{{old('active')}}"  class="custom-control-input" id="active" name="active">
                            <label class="custom-control-label" for="active">Urgent Or Not Urgent</label>
                        </div>
                    </div>
                    <div class="input-group col-11 mb-3">
                        <input type="text" id="title" value="{{old('title')}}" name="title" class="form-control" placeholder="title">
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"  id="message" name="message" placeholder="Enter Message"
                                style="height: 90px;"></textarea>
                        </div>
                    </div>
                    <button type="submit"  class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
    <script src="{{ asset('cms/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('cms/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('cms/dist/js/adminlte.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

    <script>
        // function addCom() {
        //     axios.post('/request/complaint/', {
        //             student_name: document.getElementById("student_name").value,
        //             student_number: document.getElementById("student_number").value,
        //             student_email: document.getElementById("student_email").value,
        //             student_image: document.getElementById("student_image").value,
        //             select: document.getElementById("select").value,
        //             active: document.getElementById("active").checked,
        //             title: document.getElementById("title").value,
        //             message: document.getElementById("message").value,
        //         })
        //         .then((response) => {
        //             Swal.fire({
        //                 icon: "success",
        //                 title: response.data.message,
        //                 showConfirmButton: false,
        //                 timer: 1500
        //             })

        //         })
        //         .catch((error) => {
        //             Swal.fire({
        //                 icon: "error",
        //                 title: error.response.data.message,
        //                 showConfirmButton: false,
        //                 timer: 1500
        //             })

        //         })

        // }
    </script>

</body>

</html>
