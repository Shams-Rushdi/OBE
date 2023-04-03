@extends('include_sa.master')
@section("content")
@if (session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

<div class="container col-md-12 col-sm-10 mt-10">
  <div class="card mb-4">
    <div class="card-header d-flex justify-content-between pb-0 p-3">
      <h5 class="mb-1">My Jobs</h5>
      <!-- Button trigger modal -->
      <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add New Job
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create New Job</h5>
              <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{route('myjobs.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-group">
                  <label class="form-control-label">Company Name</label>
                  <input class="form-control" type="text" value="{{old('company_name')}}" name="company_name">
                  @error('company_name')
                  <p class="text-danger">{{$message}}</p>
                  @enderror                  
                </div>

                <div class="form-group">
                  <label class="form-control-label">Job Title</label>
                  <input class="form-control" type="text" value="{{old('job_title')}}" name="job_title">
                  @error('job_title')
                  <p class="text-danger">{{$message}}</p>
                  @enderror                  
                </div>

                <div class="form-group">
                  <label>Select Category</label>
                  <select class="form-control" name="job_category_id">
                    @foreach ($job_categories as $category)
                    <option value="{{$category->id}}" @if (old('job_category_id') == $category->id) {{ 'selected' }} @endif>{{$category->name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label class="form-control-label">Description</label>
                  <textarea class="form-control" name="description">
                    {{old('description')}}
                  </textarea>
                  @error('description')
                  <p class="text-danger">{{$message}}</p>
                  @enderror                  
                </div>

                <div class="form-group">
                  <label class="form-control-label">Job Location</label>
                  <input class="form-control" type="text" value="{{old('job_location')}}" name="job_location">
                  @error('job_location')
                  <p class="text-danger">{{$message}}</p>
                  @enderror                  
                </div>      

                <div class="form-group">
                  <label class="form-control-label">Contact Email</label>
                  <input class="form-control" type="email" value="{{old('contact_email')}}" name="contact_email">
                  @error('contact_email')
                  <p class="text-danger">{{$message}}</p>
                  @enderror                  
                </div>  

                <div class="form-group">
                  <label class="form-control-label">Website Url</label>
                  <input class="form-control" type="text" value="{{old('web_url')}}" name="web_url" placeholder="Don't forget to add http:// or https://">
                  @error('web_url')
                  <p class="text-danger">{{$message}}</p>
                  @enderror                  
                </div>
                
                <div class="form-group">
                  <label class="form-control-label">Phone</label>
                  <input class="form-control" type="text" value="{{old('phone')}}" name="phone" placeholder="Enter Phone">
                  @error('phone')
                  <p class="text-danger">{{$message}}</p>
                  @enderror                  
                </div>

                <div class="form-group">
                  <label class="form-control-label">Salary</label>
                  <input class="form-control" type="salary" value="{{old('salary')}}" name="salary">
                  @error('salary')
                  <p class="text-danger">{{$message}}</p>
                  @enderror                  
                </div>
                
                <div class="form-group">
                  <label class="form-control-label">Deadline</label>
                  <input class="form-control" type="date" value="{{old('deadline')}}" name="deadline">
                  @error('deadline')
                  <p class="text-danger">{{$message}}</p>
                  @enderror                  
                </div>

                <div class="form-group">
                  <label class="form-control-label">Company Logo</label>
                  <input class="form-control" type="file" value="{{old('image')}}" name="image">
                  @error('image')
                  <p class="text-danger">{{$message}}</p>
                  @enderror                  
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn bg-gradient-primary">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body p-3">
      <div class="row">
      @foreach ($jobs as $job)
        <div class="col-xl-3 col-md-6 mb-xl-4 mb-4">
          <div class="card card-job card-plain">
            <div class="position-relative">
              <a class="d-block shadow-xl border-radius-xl">
                <img src="{{$job->image ?  asset('uploads/'.$job->image) : asset('images/jobs/default-job-logo.jpg')}}" style="height: 250px;width: 400px;" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
              </a>
            </div>
            <div class="card-body px-1 pb-0">
              <p class="text-gradient text-dark mb-2 text-sm">{{$job->jobCategory->name}}</p>
              <a href="javascript:;">
                <h6>
                  {{$job->job_title}}
                </h6>
              </a>
              <p class="mb-4 text-sm">

              </p>
              <div class="d-flex align-items-center justify-content-between">
                <a href="{{route('myjob.alumni.details',$job->id)}}" class="btn btn-outline-primary btn-sm mb-0">View Details</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@endsection
