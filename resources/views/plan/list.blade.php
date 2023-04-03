@extends('include.master')
@section('content')
@section('title','Plan Setting')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Plan Setting</h4>
                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                <a class="btn btn-info btn-rounded m-t-10 float-end text-white" href="{{route('plans.create')}}">Add Plan</a>
                <div class="table-responsive m-t-40">
                    <table id="example23"
                        class="display nowrap table table-hover table-striped border"
                        cellspacing="0" width="100%">
                        {{@csrf_field()}}
                                <thead class="text-uppercase">
                                    <tr>

                                        <th scope="col">SL</th>
                                        <th scope="col">Membership Type</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Validity</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach($plans as $item)
                                    <tr>
                                        <td >{{$loop->iteration}}</td>
                                        <td >{{$item->membership_type}}</td>
                                        <td >{{$item->amount}}</td>
                                        <td >{{$item->validity}}</td>
                                        <td>
                                            <form action="{{route('plans.destroy',$item->id)}}"  method="Post">
                                            <a href="{{route('plans.edit',$item->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
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