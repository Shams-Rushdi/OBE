@extends('include.master')
@section('content')
@section('title','Teacher')



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Techer Panel</h4>
                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                <a class="btn btn-info btn-rounded m-t-10 float-end text-white" href="{{route('teacher.create')}}">Add Teacher</a>
                <div class="table-responsive m-t-40">
                    <table id="example23"
                        class="display nowrap table table-hover table-striped border"
                        cellspacing="0" width="100%">
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
                                    <a href="{{route('teacher.show',$teacher->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> view</a>
                                    <a href="{{route('teacher.edit',$teacher->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
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

