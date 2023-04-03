@extends('include.master')
@section('content')
@section('title','workshop')

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

    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
            <form class="form-valide" action="{{route('workshops.store')}}" method="post" enctype="multipart/form-data">
            @csrf
                <h4 class="header-title">Workshop</h4>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Workshop Title</label>
                    <input class="form-control" type="text" name="title" value="{{old('title')}}" id="example-text-input">

                    @error('title')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div>
                    <label class="col-form-label">Select Category</label>
                    <select name="workshop_category_id" class="form-control py-2">
                        @foreach ($workshop_categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="col-form-label">Select Type</label>
                    <select name="type" class="form-control py-2">
                     
                            <option value="Free">Free</option>
                            <option value="Paid">Paid</option>
             
                    </select>
                    @error('type')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Workshop Description</label>
                    <textarea id="editor" class="form-control" type="text" name="description" id="example-text-input">
                        {{old('description')}}
                    </textarea>
                    @error('description')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Start Date</label>
                    <input class="form-control" type="date" name="start_date" value="{{old('start_date')}}" id="example-text-input">

                    @error('start_date')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">End Date</label>
                    <input class="form-control" type="date" name="end_date" value="{{old('end_date')}}" id="example-text-input">

                    @error('end_date')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Location</label>
                    <input class="form-control" type="text" name="location" value="{{old('location')}}" id="example-text-input">

                    @error('location')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Duration (hour)</label>
                    <input class="form-control" type="number" name="duration" value="{{old('duration')}}" id="example-text-input">

                    @error('duration')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Organizer</label>
                    <input class="form-control" type="text" name="organizer" value="{{old('organizer')}}" id="example-text-input">

                    @error('organizer')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Workshop Image</label>
                    <input class="form-control" type="file" name="image" id="example-text-input">
                    @error('image')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">cost</label>
                    <input class="form-control" type="number" name="cost" value="{{old('cost')}}" id="example-text-input">

                    @error('cost')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="container mt-5">
                        <div class="row">
                            <div class="customer_records">

                                <div class="mb-2 mt-3">
                                    <label for="" class="col-form-label">Speaker Name</label>
                                    <input  type="text" name="name[]" class="form-control" >
                                </div>

                                <div class="mb-2">
                                    <label for="" class="col-form-label">Speaker Email</label>
                                    <input  type="text" name="email[]" class="form-control" >
                                </div>

                                <div class="mb-2">
                                    <label for="" class="col-form-label">Speaker Bio</label>
                                    <input  type="text" name="bio[]" class="form-control" >
                                </div>

                                <div class="mb-2">
                                    <label for="" class="col-form-label">Speaker Image</label>
                                    <input  type="file" name="speaker_image[]" class="form-control" >
                                </div>

                                <a class="extra-fields-customer btn btn-success" href="#">Add New</a>
                            </div>

                        </div>

                        <div class="customer_records_dynamic"></div>
                </div>

                <button class="mt-5 btn btn-primary" type="submit">Submit</button>
            </div>

                </form>
            </div>
        </div>
    </div>
<!-- main content area end -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $('.extra-fields-customer').click(function() {
        $('.customer_records').clone().appendTo('.customer_records_dynamic');
        $('.customer_records_dynamic .customer_records').addClass('single remove');
        $('.single .extra-fields-customer').remove();
        $('.single').append('<a href="#" class="remove-field btn-remove-customer btn btn-danger">Remove</a>');
        $('.customer_records_dynamic > .single').attr("class", "remove");

        $('.customer_records_dynamic input').each(function() {
            var count = 0;
            var fieldname = $(this).attr("name");
            $(this).attr('name', fieldname + count);
            count++;
        });

    });

        $(document).on('click', '.remove-field', function(e) {
        $(this).parent('.remove').remove();
        e.preventDefault();
        });
    </script>

    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
