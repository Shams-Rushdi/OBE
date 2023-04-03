@extends('include.master')
@section('content')
@section('title','Job')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Job List</h4>
                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                <a class="btn btn-info btn-rounded m-t-10 float-end text-white" href="{{route('jobs.create')}}">Add Job</a>
                <div class="table-responsive m-t-40">
                    <table id="example23"
                        class="display nowrap table table-hover table-striped border"
                        cellspacing="0" width="100%">
                        {{@csrf_field()}}
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Company Name </th>
                                <th scope="col">Job Title</th>
                                <th scope="col">Job Location</th>
                                <th scope="col">Salary</th>
                                <th scope="col">Total Applicants</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($jobs as $item)
                            <tr>
                                <td >{{$loop->iteration}}</td>
                                <td >{{$item->company_name}}</td>
                                <td >{{$item->job_title ?? ' '}}</td>
                                <td >{{$item->job_location}}</td>
                                <td >{{$item->salary}}</td>
                                <td >{{$item->jobApplications->count()}}</td>
                                <td>
                                    <form action="{{route('jobs.destroy',$item->id)}}"  method="Post">
                                    <a href="{{route('job.admin.show',$item->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> view</a>
                                    <a href="{{route('jobs.edit',$item->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
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
