@extends('include_sa.master')
@section("content")

<div class="container mt-9 mb-5" >
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body text-left " >
            @if(Auth::user()->expire == 'Null')
              <h1 class="mb-4" style="margin-bottom: 100px;"></h1>
              <p class="lead mb-5"> </p>
              <a href="#" class="btn btn-primary"></a>
                
                @else
              <h1 class="mb-4" style="margin-bottom: 100px;">Pending ........</h1>
              <p class="lead mb-5">Waiting for admin approval</p>

            @endif

            </div>
          </div>
        </div>
      </div>

</div>
@endsection

