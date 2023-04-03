@extends('include.master')
@section('content')
@section('title','Teacher')


<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
        <form class="form-valide" action="{{route('teacher.store')}}" method="post" enctype="multipart/form-data">
        {{@csrf_field()}}

            <h4 class="header-title">Add Teacher</h4><br><br>

            <div class="form-group">
                <label for="example-text-input" class="col-form-label">Teacher ID</label>
                <input class="form-control" type="text" name="teacher_id"value="" id="example-text-input">
                @error('teacher_id')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="example-text-input" class="col-form-label">User Name</label>
                <input class="form-control" type="text" name="name"value="" id="example-text-input">

                @error('name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="example-text-input" class="col-form-label">Email</label>
                <input class="form-control" type="email" name="email"value="" id="example-text-input">
                @error('email')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="example-text-input" class="col-form-label">Phone Number</label>
                <input class="form-control" type="text" name="phone_number"value="" id="example-text-input">
            </div>


            <div class="form-group">
                <label for="example-text-input" class="col-form-label">Password</label>
                <input class="form-control" type="text" name="password"value="" id="example-text-input">
                @error('password')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="col-form-label">Select Department</label>
                <select name="department_id" class="form-control py-2">
                    <option value="">Select Option</option>
                    @foreach ($departments as $department)
                        <option value="{{$department->id}}">{{$department->name}}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>


</div>
<!-- main content area end -->
@endsection
