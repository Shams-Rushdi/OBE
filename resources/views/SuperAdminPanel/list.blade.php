
@extends('include.master')
@section('content')
@section('title','Super Admin')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Super Admin</h4>
                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                <a class="btn btn-info btn-rounded m-t-10 float-end text-white" href="{{route('superadmin.create')}}">Add Super Admin</a>
                <div class="table-responsive m-t-40">
                    <table id="example23"
                        class="display nowrap table table-hover table-striped border"
                        cellspacing="0" width="100%">
                        {{@csrf_field()}}
                                            <thead class="text-uppercase">
                                                <tr>

                                                    <th scope="col">superadmin Name</th>
                                                    <th scope="col">Email </th>
                                                    <th scope="col">Phone Number</th>
                                                    <th scope="col">Status</th>

                                                    <th scope="col">action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($superadmin as $superadmin)
                                                <tr>
                                                    <td >{{$superadmin->name}}</td>
                                                    <td >{{$superadmin->email}}</td>
                                                    <td >{{$superadmin->phone_number}}</td>
                                                    <td><span class="badge bg-label-primary me-1">{{$superadmin->status}}</span></td>
                                                <td>
                                                 <form action="{{route('superadmin.destroy',$superadmin->id)}}"  method="Post">
                                                    <a href="{{route('superadmin.edit',$superadmin->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
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