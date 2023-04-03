@extends('include.master')
@section('content')
@section('title','Role & Permissions')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Role With Permission</h4>
                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                <div class="table-responsive m-t-40">
                    <table id="example23"
                        class="display nowrap table table-hover table-striped border"
                        cellspacing="0" width="100%">
                        {{@csrf_field()}}
                        <thead class="text-uppercase">
                            <tr>

                                <th scope="col">SL</th>
                                <th scope="col">Name </th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($role as $role)
                            <tr>
                                <td >{{$loop->iteration}}</td>
                                <td >{{$role->name}}</td>
                                <td>
                                    <form action="{{route('role-permission.destroy',$role->id)}}"  method="Post">
                                    <a href="{{route('role-permission.edit',$role->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                                    @csrf
                                    @method('DELETE')
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