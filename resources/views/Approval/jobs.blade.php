@extends('include.master')
@section('content')
@section('title','Job')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Job List for Approval</h4>
                <div class="table-responsive m-t-40">
                    <table "
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
                                <td><a href="{{route('approval.job',$item->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>view</a></td>
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
