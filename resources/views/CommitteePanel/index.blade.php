@extends('include.master')
@section('content')
@section('title','Committee ')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Committee  Panel</h4>
                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                <a class="btn btn-info btn-rounded m-t-10 float-end text-white" href="{{route('committee.create')}}">Add Committee </a>
                <div class="table-responsive m-t-40">
                    <table id="example23"
                        class="display nowrap table table-hover table-striped border"
                        cellspacing="0" width="100%">
                        {{@csrf_field()}}
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Designation</th>
                                <th scope="col">Email </th>
                                <th scope="col">Contact </th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($committee as $committee)
                            <tr>
                                <td >{{$committee->name}}</td>
                                <td >{{$committee->CommitteeCategory->name ?? ""}}</td>
                                <td >{{$committee->designation}}</td>
                                <td >{{$committee->email}}</td>
                                <td >{{$committee->phone_number}}</td>
                            <td>
                             <form action="{{route('committee.destroy',$committee->id)}}"  method="Post">
                                <a href="{{route('committee.edit',$committee->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
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