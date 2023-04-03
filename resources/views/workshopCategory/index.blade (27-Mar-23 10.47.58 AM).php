@extends('include.master')
@section('content')
@section('index','Workshop Category')
@section('title','Workshop Category List')
            <!-- page title area end -->
<div class="main-content-inner">
    <div class="row">

        <!-- Progress Table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    @if(Session::has('msg'))
                        <p class="alert-alert-success">{{Session::get('msg')}}</p>
                    @endif
                <a type="button" href="{{route('workshopcategories.create')}}" class="btn btn-primary btn-lg float-right m-3"> <i class="fa fa-plus"></i> Add Workshop Category</a>
                <br>
                    <h4 class="header-title">Workshop Category</h4>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table table-hover progress-table text-center">
                            {{@csrf_field()}}
                                <thead class="text-uppercase">
                                    <tr>

                                        <th scope="col">SL</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach($workshop_categories as $item)
                                    <tr>
                                        <td >{{$loop->iteration}}</td>
                                        <td >{{$item->name}}</td>
                                        <td>
                                            <form action="{{route('workshopcategories.destroy',$item->id)}}"  method="Post">
                                            <a href="{{route('workshopcategories.edit',$item->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
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

        <!-- main content area end -->
@endsection
