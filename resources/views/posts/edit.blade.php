@extends('layouts/app')
@section('title')
Edit-Post
@endsection
@section('content')


<form class="container" method="POST" action="{{route('posts.update',['post'=> $post->id])}}">
    @csrf
    @method('put')
    <div class="form-group mt-3">
        <label for="title"><b>Title</b></label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{$post->title}}">
        @error('title') <div class="form-text text-danger" >{{ $message }}</div>  @enderror
    </div>
    <div class="form-group mt-3">
        <label for="title"><b>Posted By</b></label>
        <!-- <input  class="form-control" type="text" value="{{$post->user?$post->user->name:'user not found'}}" aria-label="readonly input example" readonly> -->
        <input type="text" class="form-control" id="title" name="posted_by" value="{{$post->user?$post->user->name:'user not found'}}">
    </div>
    

    <div class="form-group mt-3">
        <label for="desc"><b>Description</b></label>
        <textarea id="desc" name="description" class="form-control @error('description') is-invalid @enderror" >{{$post->description}}</textarea>
        @error('description') <div class="form-text text-danger" >{{ $message }}</div>  @enderror
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Update</button>
</form>





@endsection
