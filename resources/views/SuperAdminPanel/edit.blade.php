@extends('include.master')
@section('content')
@section('title','Super Admin')

<link href="{{asset('dist')}}/css/pages/file-upload.css" rel="stylesheet">
<link href="{{asset('dist')}}/css/style.min.css" rel="stylesheet">
<script src="{{asset('assets')}}/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('assets')}}/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script src="{{asset('assets')}}/node_modules/jquery/dist/jquery.min.js"></script>
<script src="{{asset('assets')}}/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('dist')}}/js/perfect-scrollbar.jquery.min.js"></script>
<script src="{{asset('dist')}}/js/waves.js"></script>
<script src="{{asset('dist')}}/js/sidebarmenu.js"></script>
<script src="{{asset('dist')}}/js/custom.min.js"></script>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Super Admin</h4>
                <h6 class="card-subtitle"><br> </h6>
                <form class="form-valide" action="{{route('superadmin.update',$superadmin->id)}}" method="post" enctype="multipart/form-data">
                    {{@csrf_field()}}

                        @method('PUT')

                        <input type="hidden" name="id" placeholder="id" value="{{ $superadmin->id }}">
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Name</label>
                            <input class="form-control" type="text" name="name"value="{{$superadmin->name}}" id="example-text-input">
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Email</label>
                            <input class="form-control" type="email" name="email"value="{{$superadmin->email }}" id="example-text-input">
                            @error('email')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Phone Number</label>
                            <input class="form-control" type="text" name="phone_number"value="{{$superadmin->phone_number }}" id="example-text-input">
                        </div>
                      <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
            </div>
        </div>
    </div>
</div>

@endsection

