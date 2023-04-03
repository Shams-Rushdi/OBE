@extends('include.master')
@section('content')
@section('title','Student')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Student Panel</h4>
                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                <a class="btn btn-info btn-rounded m-t-10 float-end text-white" href="{{route('student.create')}}">Add Student</a>
                <div class="table-responsive m-t-40">

                    <table id="example23"
                        class="display nowrap table table-hover table-striped border"
                        cellspacing="0" width="100%">
                        {{@csrf_field()}}
                            <thead class="text-uppercase">
                                <tr>

                                    <th scope="col">Student Id</th>
                                    <th scope="col">Batch No</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Email </th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Status</th>

                                    <th scope="col">action</th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach($student as $student)
                                <tr>
                                    <td >{{$student->student_id}}</td>
                                    <td >{{$student->batch_id}}</td>
                                    <td >{{$student->name}}</td>
                                    <td >{{$student->email}}</td>
                                    <td >{{$student->phone_number}}</td>
                                    {{-- <td><span class="badge bg-label-primary me-1">{{$student->status}}</span></td> --}}
                                    <td>
                                        <input type="checkbox" data-id="{{ $student->id }}" name="status" class="js-switch" {{ $student->status == 1 ? 'checked' : '' }}>
                                    </td>
                                <td>
                                    <form action="{{route('student.destroy',$student->id)}}"  method="Post">
                                    <a href="{{route('student.show',$student->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Show</a>
                                    <a href="{{route('student.edit',$student->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
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
</div

@endsection
