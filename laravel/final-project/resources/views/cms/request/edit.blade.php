@extends('cms.parent')
@section('content')
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Response Suggestion Or Complaints </h3>
            </div>
            <form>
                @csrf
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Student Number</label>
                        <input type="tetx" value="{{$data->student_id}}" disabled class="form-control" >
                      </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" value="{{$data->student_name}}" disabled class="form-control" >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" value="{{$data->student_email}}" disabled class="form-control" >
                      </div>

                    <div class="form-group">
                      <label>response</label>
                      <textarea id="textarea" name="textarea"  value="" class="form-control" rows="5" placeholder="Enter response ...">{{$data->response ??''}}</textarea>
                    </div>
                  </div>
                <div class="card-footer">
                    <button type="button" onclick="response_std({{$data->id}})"
                        class="btn btn-primary">response</button>
                </div>
            </form>
        </div>

    </div>
@endsection
@section('script')
    <script>
        function response_std(id) {
            axios.put('/cms/admin/complaints/update/' + id, {
                textarea: document.getElementById("textarea").value,

            }).then((response)=>{
                window.location.href='/cms/admin/complaints/index/'
                Swal.fire({
                        position: 'center',
                        icon:response.data.icon,
                        title: response.data.message,
                        showConfirmButton: false,
                        timer: 1500
                    })
            }).catch((error)=>{
                Swal.fire({
                        position: 'center',
                        icon: error.response.data.icon,
                        title: error.response.data.message,
                        showConfirmButton: false,
                        timer: 1500
                    })
            })
        }
    </script>
@endsection
