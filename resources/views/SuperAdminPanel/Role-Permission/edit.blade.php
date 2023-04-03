@extends('include.master')
@section('content')
@section('title','Role-Permission')

            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                    <form class="form-valide" action="{{route('role-permission.update',$role)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                        <h4 class="header-title">Role</h4>
                        <input type="hidden" name="id" placeholder="id" value="{{ $role->id }}">
                        
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Role Name</label>
                            <input class="form-control" type="text" name="name"value="{{old('name',$role->name)}}" id="example-text-input" readonly>

                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Permissions</label><br><br>
                            @foreach($permission as $permission)
                        
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $permission->id }}" {{ $role->permissions->pluck('id')->contains($permission->id) ? 'checked' : '' }}>
                                <label class="form-check-label" for="">
                                    {{ $permission->name }}
                                </label>
                            </div>


                        
                            <br>
                        @endforeach
                        
                        </div>
                            <br>
                        <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>


        </div>
        <!-- main content area end -->
        @endsection
