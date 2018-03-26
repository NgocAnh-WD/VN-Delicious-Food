@extends('layouts.admin')

@section('content')
<h1 style="color: #0099CC; text-align: center; margin-top: 10px;">Comments</h1>
@if(Session::has('deleted_comment'))
<p class="bg-danger">{{session('deleted_comment')}}</p>
@endif
<div class="container">
    <div class="row col-md-12 form-group" style="margin-left: 10px;">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Avata Image</th>
                    <th>Product Name</th>
                    <th>Parent Comment</th>
                    <th>Title</th> 
                    <th>Content</th>
                    <th>Created_at</th>
                    <th>Action</th>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                <tr>
                    <th>{{$comment->id}}</th>
                    <th>{{$comment->user->username}}</th>
                    <th><img height="50px" width="50px" src="{{asset( $comment->user->avata_image )}}" alt=""></th>
                    <th>{{$comment->product->name}}</th>
                    <th><a href="{{ url('/admin/comments/'.$comment->id.'/reply') }}">{{$comment->title}}</a></th>
                    <th>{{$comment->content}}</th>
                    <th>{{$comment->created_at}}</th>
                    <th>
                        <form class="delete" action="{{ route('admin.comments.destroy',$comment->id) }}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}
                            <input type="submit" value="Delete Comment">
                        </form>                     
<!--                        <script>
                            $(".delete").on("submit", function () {
                                return confirm("Are you sure?");
                            });
                        </script>-->
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection