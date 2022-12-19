@extends('layouts/app')
@section('title')
All-Posts
@endsection
@section('content')

<a class="btn btn-primary mt-5" href="{{route('posts.create')}}">NewPost</a>
<table class="table mt-5">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Posted By</th>
        <th scope="col">Description</th>
        <th scope="col">Created At</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
     <?php
     $postID=1;
     ?>
        @foreach($posts as $post)
        <tr>
        <th scope="row">{{$postID++}}</th>
        <td>{{$post->title}}</td>
        <td>{{$post->user?$post->user->name:'user not found'}}</td>
        <td>{{$post->description}}</td>
        <td>{{$post->created_at}}</td>
        <td>
			<a class="btn btn-primary" href="{{route('posts.edit',['post'=>$post->id])}}">Edit</a>
			<a class="btn btn-info" href="{{route('posts.show',['post'=>$post->id])}}">View</a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#id{{$post->id}}">
            Delete
            </button>
			
            <!-- Modal -->
            <div class="modal fade" id="id{{$post['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">You are now deleting the post</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are You Sure To Delete This Post?
                                <br>
                                Post Title:- {{$post->title}}
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                <form method="POST" action="{{route('posts.destroy', ['post'=> $post->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-success">Confirm</button>
                                

                                </form>
                                </div>
                            </div>
                        </div>
            </div>
		</td>
        </tr>
        @endforeach
    </tbody>
</table>




@endsection
