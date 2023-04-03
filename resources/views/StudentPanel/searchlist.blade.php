@extends('include.master')
@section('content')
@section('index','Student Index')
@section('title','Student')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
 <!-- Start datatable css -->
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/typography.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/default-css.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/styles.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/responsive.css">
    <!-- modernizr css -->
    <script src="{{asset('frontend')}}/js/vendor/modernizr-2.8.3.min.js"></script>



            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">

                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                @if(Session::has('msg'))
                                    <p class="alert-alert-success">{{Session::get('msg')}}</p>
                                @endif
                            <a type="button" href="{{route('student.create')}}" class="btn btn-primary btn-lg float-right m-3">+ Add Student</a>
                            <br>
                                <h4 class="header-title">Student Table</h4>
                                <div class="data-tables datatable-dark">
                                    <div class="table-responsive">
                                            <form action="{{route('student.search')}}"  method="GET">
                                                @csrf
                                                <div class="row mb-3">
                                                    <label for="" class="col-form-label p-3">Department :</label>
                                                    <div class="col-md-3 col-sm-3 p-2">
                                                        <select class="custom-select" name="department_id">
                                                            <option value="">Please Select</option>
                                                                @foreach($departments as $key => $value)
                                                                <option value="{{$key}}">{{ $value }}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                    <label for="" class="col-form-label p-3">Student ID :</label>
                                                    <div class="col-md-3 col-sm-3 p-1">
                                                        <input type="text" name="student_id" class="form-control"/>
                                                    </div>
                                                    <button type="submit" class="my-button"><i class="fa fa-search" aria-hidden="true"></i>  Search</button>
                                            </div>
                                            </form>


                                            <table class="table table-hover progress-table text-center" style="width:100%" id="example">
                                                {{@csrf_field()}}
                                                    <thead class="text-uppercase">
                                                        <tr>
        
                                                            <th scope="col">student Name</th>
                                                            <th scope="col">Email </th>
                                                            <th scope="col">Phone Number</th>
                                                            <th scope="col">Status</th>
        
                                                            <th scope="col">action</th>
                                                        </tr>
                                                    </thead>
        
                                                    <tbody>
                                                    @foreach($student as $student)
                                                        <tr>
                                                            <td >{{$student->name}}</td>
                                                            <td >{{$student->email}}</td>
                                                            <td >{{$student->phone_number}}</td>
                                                            {{-- <td><span class="badge bg-label-primary me-1">{{$student->status}}</span></td> --}}
                                                            <td>
                                                                <input type="checkbox" data-id="{{ $student->id }}" name="status" class="js-switch" {{ $student->status == 1 ? 'checked' : '' }}>
                                                            </td>
                                                        <td>
                                                         <form action="{{route('student.destroy',$student->id)}}"  method="Post">
                                                            <a href="{{route('student.edit',$student->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
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

                </div>
                </div>
             </div>

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

<script src="{{asset('frontend')}}/js/vendor/jquery-2.2.4.min.js"></script>
<!-- bootstrap 4 js -->
<script src="{{asset('frontend')}}/js/popper.min.js"></script>
<script src="{{asset('frontend')}}/js/bootstrap.min.js"></script>
<script src="{{asset('frontend')}}/js/owl.carousel.min.js"></script>
<script src="{{asset('frontend')}}/js/metisMenu.min.js"></script>
<script src="{{asset('frontend')}}/js/jquery.slimscroll.min.js"></script>
<script src="{{asset('frontend')}}/js/jquery.slicknav.min.js"></script>

<!-- Start datatable js -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
<!-- others plugins -->
<script src="{{asset('frontend')}}/js/plugins.js"></script>
<script src="{{asset('frontend')}}/js/scripts.js"></script>
        @endsection
