@extends('include_sa.master')
@section("content")

<div class="container mt-9 mb-5" >
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body text-center " >
            @if(Auth::user()->expire == null)
              <h1 class="mb-4" style="margin-bottom: 100px;">You Need to pay the registration fee</h1>
              <p class="lead mb-5"> Please complete your payment or Contact <br> @01717560077</p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModalMessage"  class="btn btn-primary" ata-bs-toggle="tooltip" data-bs-placement="top" style="cursor: pointer;">Click here to Pay</a>
                
            @else
              <h1 class="mb-4" style="margin-bottom: 100px;">Subscription Expired</h1>
              <p class="lead mb-5">Your subscription has expired. Please renew your subscription to continue using our service.</p>
              <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModalMessage"  class="btn btn-primary" ata-bs-toggle="tooltip" data-bs-placement="top" style="cursor: pointer;">Renew Subscription</a>
           @endif
           

              <div class="col-md-4">
              <!-- Button trigger modal -->
            
                <!-- Modal -->
                <div class="modal fade" id="exampleModalMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="mb-1" style="margin-bottom: 100px;">Payment</h3>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>

                      <div class="modal-body" style="text-align: left">
                        <form role="form text-left"  action="{{route('payment')}}" method="post" enctype="multipart/form-data">
                          {{@csrf_field()}}
                          
                          <h5 class="mb-4" style="margin-bottom: 100px;">Membership Type:</strong> &nbsp;{{Auth::user()->plan->membership_type}}</h5>
                          <h5 class="mb-2" style="margin-bottom: 100px;">Amount:</strong> &nbsp;{{Auth::user()->plan->amount}}</h5>
                          <p>Please Make Payment on 01521328548 Marchent Account</p>
                          <input type="hidden" class="form-control" name="plan_id" value="{{Auth::user()->plan->id}}" >
                          <input type="hidden" class="form-control" name="amount"  value="{{Auth::user()->plan->amount}}" >
                          
                          <hr>
                          
                          <div class="form-group" >
                            <label for="recipient-name" class="col-form-label">Bkash Number:</label>
                            <input type="text" class="form-control" name="bkash_number"  id="bkash_number" maxlength="11" required>
                            @error('bkash_number')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                          </div>
                          <div class="form-group" >
                            <label for="recipient-name" class="col-form-label">Transaction ID:</label>
                            <input type="text" class="form-control" name="transactionId" id="transactionId" required>
                            @error('transactionId')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                          </div>
                          <button  class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn bg-gradient-primary">Submit</button>
                        </form>
                      </div>
                      <div class="modal-footer">
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

</div>
@endsection

