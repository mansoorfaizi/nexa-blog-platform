@extends('backend.layouts.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
            {{__('post.posts')}}
                <a href="{{ route('post.create') }}" class="btn btn-success float-right">{{__('post.add_post')}}</a>
                <br>
                <br>
                <a href="{{ route('post.trash') }}" class="btn btn-danger float-right">{{__('post.trash')}}</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{__('post.number')}}</th>
                            <th>{{__('post.title')}}</th>
                            <th>{{__('post.sub_title')}}</th>
                            <th>{{__('post.author')}}</th>
                            <th>{{__('post.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $index => $post)
                            <tr>
                                <td> {{ $posts->currentPage() * 10 - 10 + $index + 1 }}</td>
                                <td> {{ $post->title }} </td>
                                <td> {{ $post->sub_title }} </td>
                                <th> {{ $post->profile->user->name }}</th>
                                <td>
                                    <a href="#" class="delete" id="{{ $post->id }}"><i
                                            class="fa fa-trash"></i></a>|
                                    <a href="{{ route('post.edit', ['post' => $post->id]) }}"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <tfoot>
                    {{ $posts->links() }}
                </tfoot>
            </div>
        </div>

    </div>
    <!-- End of Main Content -->
@endsection


@section('script')
    <script>
        $('.delete').click(function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    var id = $(this).attr('id');
                    var url = 'post/' + id;

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: url,
                        type: 'DELETE',
                        datatype: 'json',
                        data: {
                            "_method": 'DELETE',
                        },
                        success:function(data) {
                            Location.reloade();
                        }
                    })
                }
            })
        })
    </script>
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
@endsection