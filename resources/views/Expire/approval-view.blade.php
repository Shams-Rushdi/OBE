@extends('include.master')
@section('content')
@section('title','Alumni')

    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title mb-4">Alumni Approval</h4>
                
                
                
                <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="d-flex flex-column" style="background-color: #f1f1f1;  padding: 18px 16px; border-radius: 10px;">
                          <h3> Membership Payment Details</h3>
                        <hr>
                            <div class="col-md-12">

                                <h5>Student ID     : {{$approval->studentId}}</h5>
                                <h5>Membership Type: {{$approval->plan->membership_type}}</h5>
                                <h5>Bkash Number   : {{$approval->bkash_number}}</h5>
                                <h5>Transaction ID : {{$approval->transactionId}}</h5>
                                <h5>Amount         : {{$approval->amount}}</h5>

                            </div>
                        </div>
                    </div>
                </div>






                   <div>
                    <form method="post" action="{{route('alumni.approval.update', $approval->id)}}" enctype="form-data">
                        @csrf
                      <div class="form-group col-md-4">
                        <label for="approval-status">Approval Status:</label>
                        <select class="form-control" id="status" name="status">
                            <option value="1" @if($approval->status == 1) selected @endif>Approved</option>
                            <option value="0" @if($approval->status == 0) selected @endif>Pending</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary mb-4">Submit</button>
                    </form>
                  </div>

    
            </div>
        </div>
    </div>
<!-- main content area end -->
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection