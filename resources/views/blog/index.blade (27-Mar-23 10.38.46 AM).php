@extends('include.master')
@section('content')
@section('index','Blogs')
@section('title','Blog List')
            <!-- page title area end -->
   
         
<div class="main-content-inner">
    <div class="row">

        <!-- Hoverable Rows Table end -->
        <!-- Progress Table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    @if(Session::has('msg'))
                        <p class="alert-alert-success">{{Session::get('msg')}}</p>
                    @endif

                    
                    <a type="button" href="{{route('blogs.create')}}" class="btn btn-primary btn-lg float-right m-3"> <i class="fa fa-plus"></i> Add Blogs</a>
                    
                <br>
                    <h4 class="header-title">Blogs</h4>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table table-hover progress-table text-center">
                            {{@csrf_field()}}
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach($blogs as $item)
                                    <tr>
                                        <td >{{$loop->iteration}}</td>
                                        <td >{{$item->title}}</td>
                                        <td >{{$item->author}}</td>
                                        <td ><img style="width:150px; height:100px;" src="{{ asset('uploads/'.$item->image)}}" alt=""></td>
                                        <td >{{$item->blogsCategory->name ?? ''}}</td>
                                            <td>
                                                <form action="{{route('blogs.destroy',$item->id)}}"  method="Post">
                                                <a href="{{route('blogs.show',$item->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> view</a>
                                                <a href="{{route('blogs.edit',$item->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
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
