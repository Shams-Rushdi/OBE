@extends('include.master')
@section('content')
@section('title','Committee')

            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                    <form class="form-valide" action="{{route('committee.store')}}" method="post" enctype="multipart/form-data">
                    {{@csrf_field()}}

                        <h4 class="header-title">Add Committee</h4><br><br>
                    
                        <div class="form-group">
                        <label class="col-form-label">Committee Category</label><br>
                        <select name="commitee_category_id" class="form-control form-select">
                            @foreach ($category as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Name</label>
                            <input class="form-control" type="text" name="name"value="{{old('name')}}" id="example-text-input">

                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Email</label>
                            <input class="form-control" type="email" name="email"value="{{old('email')}}" id="example-text-input">
                            @error('email')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Phone Number</label>
                            <input class="form-control" type="text" name="phone_number"value="{{old('phone_number')}}" id="example-text-input">
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Designation</label>
                            <input class="form-control" type="text" name="designation"value="{{old('designation')}}" id="example-text-input">
                            @error('designation')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Company Name</label>
                            <input class="form-control" type="text" name="company_name"value="{{old('company_name')}}" id="example-text-input">
                            @error('company_name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror                            
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
