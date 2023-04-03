@extends('include.master')
@section('content')
@section('title','Job Application')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Job Application List</h4>
                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                <div class="table-responsive m-t-40">
                    <table id="example23"
                        class="display nowrap table table-hover table-striped border"
                        cellspacing="0" width="100%">
                        {{@csrf_field()}}
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Resume </th>
                                <th scope="col">Applicant</th>
                                <th scope="col">Applicant Phone</th>
                                <th scope="col">Applicant Email</th>
                                <th scope="col">Job Title</th>
                                <th scope="col">Delete Application</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($job_application as $item)
                            <tr>
                                <td >{{$loop->iteration}}</td>
                                <td ><a href="{{asset('uploads/'.$item->resume)}}" target="blank">Open Resume</a></td>
                                <td >{{$item->user->name}}</td>
                                <td >{{$item->user->phone_number}}</td>
                                <td >{{$item->user->email}}</td>
                                <td >{{$item->job->job_title ?? ' '}}</td>
                                <td>
                                    <form action="{{route('jobapplications.destroy',$item->id)}}"  method="Post">
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