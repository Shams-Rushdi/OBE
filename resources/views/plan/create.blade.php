@extends('include.master')
@section('content')
@section('title','Plan Settings')

    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
            <form class="form-valide" action="{{route('plans.store')}}" method="post" enctype="multipart/form-data">
            @csrf
                <h3 class="header-title">Add Plan</h3>
                <br><br>
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Membership Type</label>
                    <input class="form-control" type="text" name="membership_type"  id="example-text-input">

                    @error('membership_type')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Amount</label>
                    <input class="form-control" type="text" name="amount"  id="example-text-input">
                       
                    
                    @error('amount')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>   
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Validity</label>
                    <input class="form-control" type="text" name="validity"  id="example-text-input">
                       
                    
                    @error('validity')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>



                <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
<!-- main content area end -->
@endsection
