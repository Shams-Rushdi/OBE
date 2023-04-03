@extends('include.master')
@section('content')
@section('title','Commitee')

        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                <form class="form-valide" action="{{route('committee.update',$commitee->id)}}" method="post" enctype="multipart/form-data">
                {{@csrf_field()}}

                    @method('PATCH')

                    <h4 class="header-title">Edit Committee Details</h4>
                    <input type="hidden" name="id" placeholder="id" value="{{ $commitee->id }}">

                    <div class="form-group">
                        <label class="col-form-label">Committee Category</label>
                        <select class="form-control form-select" name="committee_category_id">
                                @foreach($category as $key => $value)
                                <option value="{{$value->id}}" {{$commitee->commitee_category_id === $key ? "selected" : ""}}>{{ $value->name }}</option>
                                @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Name</label>
                        <input class="form-control" type="text" name="name" value="{{old('name',$commitee->name)}}" id="example-text-input">
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Email</label>
                        <input class="form-control" type="email" name="email"value="{{old('email',$commitee->email)}}" id="example-text-input">
                        @error('email')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Phone Number</label>
                        <input class="form-control" type="text" name="phone_number"value="{{old('phone_number',$commitee->phone_number)}}" id="example-text-input">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Designation</label>
                        <input class="form-control" type="text" name="designation"value="{{old('designation',$commitee->phone_number)}}" id="example-text-input">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Company Name</label>
                        <input class="form-control" type="text" name="company_name"value="{{old('company_name',$commitee->company_name)}}" id="example-text-input">
                    </div>

                    <div class="form-control my-3">
                        <img src="{{asset('uploads/'.$commitee->image)}}" alt="" width="500px">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Image</label>
                        <input class="form-control" type="file" name="image" id="example-text-input">
                        @error('image')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
</div>
<!-- main content area end -->
@endsection
