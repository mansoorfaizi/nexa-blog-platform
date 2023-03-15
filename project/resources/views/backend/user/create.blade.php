@extends('backend.layouts.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Create Post
            </div>
            <div class="card-body">
                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter the post title">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="subTitle">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter the post subTitle">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="subTitle">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter the post subTitle">
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="subTitle">Confirm password</label>
                        <input type="password" name="confirm_password" class="form-control" placeholder="Enter the post subTitle">
                        @error('confirm_password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Picture</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                              <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose
                              </a>
                            </span>
                            <input id="thumbnail" class="form-control" type="text" name="profile_pic">
                          </div>
                          <img id="holder" style="margin-top:15px;max-height:100px;">
                        @error('profile_pic')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                   
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
    <!-- End of Main Content -->
@endsection
