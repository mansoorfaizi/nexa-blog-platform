@extends('backend.layouts.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                {{__('setting.about')}}
            </div>
            <div class="card-body">
                <form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">{{__('setting.logo')}}</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                              <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> {{__('setting.choice')}}
                              </a>
                            </span>
                            <input id="thumbnail" class="form-control" type="text" value="{{$setting->logo}}" name="logo">
                          </div>
                          <img id="holder" style="margin-top:15px;max-height:100px;">
                        @error('logo')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="facebook">{{__('setting.facebook')}}</label>
                        <input type="text" name="facebook" value="{{$setting->facebook}}" class="form-control" placeholder="Enter the website Facebook">
                        @error('facebook')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="twitter">{{__('setting.twitter')}}</label>
                        <input type="text" name="twitter" value="{{$setting->twitter}}" class="form-control" placeholder="Enter the website twitter">
                        @error('twitter')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">{{__('setting.email')}}</label>
                        <input type="text" name="email" value="{{$setting->email}}" class="form-control" placeholder="Enter the website email">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone_number">{{__('setting.phone')}}</label>
                        <input type="text" name="phone_number" value="{{$setting->phone_number}}" class="form-control" placeholder="Enter the website phone number">
                        @error('phone_number')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">{{__('setting.address')}}</label>
                        <input type="text" name="address" value="{{$setting->address}}" class="form-control" placeholder="Enter the website address">
                        @error('address')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">{{__('setting.save')}}</button>
                </form>
            </div>
        </div>
    </div>
    <!-- End of Main Content -->
@endsection


@section('script')
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })


        @if (Session::has('success'))
            Toast.fire({
                icon: 'success',
                title: "{{ Session::get('success') }}"
            })
        @endif
    </script>
    <script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
    <script> $('#lfm').filemanager('image');</script>
@endsection
