@extends('include.master')
@section('content')
@section('title','Plan Settings')

        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                <form class="form-valide" action="{{route('plans.update',$plan->id)}}" method="post" enctype="multipart/form-data">
                {{@csrf_field()}}

                    @method('PUT')

                    <h3 class="header-title">Edit Plan Settings</h3>
                    <br><br>
                    <input type="hidden" name="id" placeholder="id" value="{{ $plan->id }}">
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Membership Type</label>
                        <input class="form-control" type="text" name="membership_type"value="{{$plan->membership_type}}" id="example-text-input">
                        @error('membership_type')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Amount</label>
                        <input class="form-control" type="text" name="amount"value="{{$plan->amount }}" id="example-text-input">
                        @error('amount')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    

                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">validity</label>
                        <input class="form-control" type="text" name="validity"value="{{$plan->validity }}" id="example-text-input">
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>


        </div>
        <!-- main content area end -->
        @endsection
