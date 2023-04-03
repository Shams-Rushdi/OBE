@extends('include.master')
@section('content')
@section('index','teacher Index')
@section('title','teacher')


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
 <link rel="stylesheet"  href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet"  href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">

                    <!-- Hoverable Rows Table end -->
                    <!-- Progress Table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                @if(Session::has('msg'))
                                    <p class="alert-alert-success">{{Session::get('msg')}}</p>
                                @endif
                            <a type="button" href="{{route('teacher.create')}}" class="btn btn-primary btn-lg float-right m-3">+ Add Teacher</a>
                            <br>
                                <h4 class="header-title">teacher Table</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <form action="{{route('teacher.search')}}"  method="GET">
                                            @csrf
                                            <div class="row mb-3">
                                                <label for="" class="col-form-label p-3">Department :</label>
                                                <div class="col-md-3 col-sm-3 p-2">
                                                    <select class="custom-select" name="department_id">
                                                        <option value="">Please Selected</option>
                                                            @foreach($department as $key => $value)
                                                            <option value="{{$key}}">{{ $value }}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                                <label for="" class="col-form-label p-3">Teacher ID :</label>
                                                <div class="col-md-3 col-sm-3 p-1">
                                                    <input type="text" name="teacher_id" placeholder="Teacher ID" class="form-control"/>
                                                </div>
                                                <button type="submit" class="my-button"><i class="fa fa-search" aria-hidden="true"></i>  Search</button>
                                        </div>
                                        </form>
                                        <table class="table table-hover progress-table text-center" style="width:100%" id="example">
                                            {{@csrf_field()}}
                                                <thead class="text-uppercase">
                                                    <tr>

                                                        <th scope="col">Teacher ID</th>
                                                        <th scope="col">Teacher Name</th>
                                                        <th scope="col">Email </th>
                                                        <th scope="col">Phone Number</th>
                                                        <th scope="col">Status</th>

                                                        <th scope="col">action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                @foreach($teacher as $teacher)
                                                    <tr>
                                                        <td >{{$teacher->teacher_id}}</td>
                                                        <td >{{$teacher->name}}</td>
                                                        <td >{{$teacher->email}}</td>
                                                        <td >{{$teacher->phone_number}}</td>
                                                        <td>
                                                            <input type="checkbox" data-id="{{ $teacher->id }}" name="status" class="js-switch" {{ $teacher->status == 1 ? 'checked' : '' }}>
                                                        </td>                                                    <td>
                                                     <form action="{{route('teacher.destroy',$teacher->id)}}"  method="Post">
                                                        <a href="{{route('teacher.edit',$teacher->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                                                        <a href="{{route('teacher.edit',$teacher->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('Are you sure to Delete?')" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                                    </form>
                                                    </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Progress Table end -->
                </div>
            </div>
        </div>
</body>

<script>
document.addEventListener("DOMContentLoaded", function() {
var exampleTable = document.querySelector("#example");
var dataTable = new DataTable(exampleTable, {
    dom: "Bfrtip",
    buttons: [
    "copy",
    "csv",
    {
        extend: "excelHtml5",
        title: "Teacher Repoprt"
    },
    "pdf",
    "print"
    ]
});
});

</script>
<script>
    let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

        elems.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' });
        });

            $(document).ready(function(){
            $('.js-switch').change(function () {
                let status = $(this).prop('checked') === true ? 1 : 0;
                let userId = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('users.update.status') }}',
                    data: {'status': status, 'id': userId},
                    success: function (data) {
                        toastr.options.closeButton = true;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.success(data.message);
                    }
                });
            });
        });
        </script>


@endsection
