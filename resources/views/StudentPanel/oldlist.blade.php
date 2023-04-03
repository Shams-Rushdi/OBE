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
                            <a type="button" href="{{route('student.create')}}" class="btn btn-primary btn-lg float-right m-3">+ Add student</a>
                            <br>
                                <h4 class="header-title">student Table</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover progress-table text-center">
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
                    <!-- Progress Table end -->
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
          
        <!-- main content area end -->
        @endsection