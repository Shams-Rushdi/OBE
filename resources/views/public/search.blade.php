@extends('include_sa.master')
@section("content")



<div class="container mt-8 ">
  <h4 class="container text-center my-5">Search A Student / Alumni Or Teacher</h4>
  <form class="row text-start">
    <div class="form-group mr-3 col-md-3 ">
      <input type="text" class="form-control" id="inputName" name="name" placeholder="Student Name">
    </div>
    <div class="form-group mr-3 col-md-3">
      <input type="text" class="form-control" id="inputId" name="student_id" placeholder="Student ID">
    </div>
    <div class="form-group mr-3 col-md-2">
      <select class="form-control" id="inputDepartment" name="department_id" placeholder="Select Department">
        <option value="" class="text-muted">Select Department</option>
        @foreach ($departments as $item)
          <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group mr-3 col-md-2">
      <input type="text" class="form-control" id="inputBatch" name="batch_id" placeholder="Batch">
    </div>
    <button type="submit" class="btn btn-primary btn-sm col-md-2">Search</button>
  </form>


  <div class="row">
    @foreach ($all_users as $item)
    <div class="col-md-6">
        <div class="card-deck">
          <div class="card mb-4">
            <div class="row no-gutters">
              <div class="col-md-4 d-flex align-items-center">
                <a href="{{route('public.show',$item->id)}}">
                  <img class="card-img" src="{{$item->profile_image ? asset('images/profile/'.$item->profile_image):asset('images/profile/profile.jpg')}}" style="height: 184px;width: 184px;" alt="Card image cap">
                </a>
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <a href="{{route('public.show',$item->id)}}">
                    <h5 class="card-title">{{$item->name}}</h5>
                  </a>
                  <ul class="list-group">
                    <li class="list-group-item border-0 ps-0 pt-0 text-height-0"><strong class="text-dark"></strong>{{$roleName = $item->getRoleNames()->first();}} @if (isset($item->plan->membership_type))
                        ({{$item->plan->membership_type}})
                    @endif </li>
                    <li class="list-group-item border-0 ps-0 pt-0 text-height-0"><strong class="text-dark"></strong>{{$item->designation_letter ?? ''}}</li>
                    <li class="list-group-item border-0 ps-0 pt-0 text-height-0"><strong class="text-dark"></strong>ID: {{$item->student_id ?? ""}}</li>
                    <li class="list-group-item border-0 ps-0 pt-0 text-height-0"><strong class="text-dark"></strong>Batch: {{$item->batch_id ?? ""}}</li>
                    <li class="list-group-item border-0 ps-0 pt-0 text-height-0"><strong class="text-dark"></strong>Department: {{$item->department->name ?? ''}}</li>

                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- Repeat this card structure for each item -->
        </div>
      </div>
        @endforeach
  </div>
</div>




@endsection
