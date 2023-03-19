<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('cms/dist/css/adminlte.min.css') }}">
    <style>
        /* .table-sari{
           position: absolute;

        } */
        form {
            margin-left: 30%
        }

        .table-sari td {
            margin-right: 10px;
            max-width: fit-content;

        }
    </style>
</head>

<body class="hold-transition register-page">
    <div class="container-fulid">
        <div style="width: 80%; position: relative; top:60px;" class="mb-5">
            <form method="get" action="{{ route('complaints.search') }}">
                <div class=" input-group rounded">
                    <input id="search-input" name="search" type="search" value="{{ Request::get('search') }}"
                        id="form1" class="form-control" />
                    <input type="submit" class="btn btn-primary">

                </div>
            </form>

            <table class="table table-hover text-nowrap table-sari mt-5">
                <thead>
                    <tr>
                        <th>student_number</th>
                        <th>student_name</th>
                        <th>student_email</th>
                        <th>urgent</th>
                        <th>type</th>
                        <th>status</th>
                        <th>title</th>
                        <th>message</th>
                        <th>closed_date</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>{{ $data->student_id ?? '' }}</td>
                        <td>{{ $data->student_name ?? '' }}</td>
                        <td>{{ $data->student_email ?? '' }}</td>
                        <td>{{ $data->urgent ?? '' }}</td>

                        <td style="font-weight: bold">{{ $data->type ?? '' }}</td>
                        <td>
                            {{ $data->status ?? '' }}
                        </td>
                        <td>{{ $data->title ?? '' }}</td>
                        <td>{{ $data->message ?? '' }}</td>
                        <td>
                            {{ $data->closed_date ?? '' }}
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>

    <script src="{{ asset('cms/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('cms/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('cms/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
