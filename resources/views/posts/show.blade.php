@extends('layouts/app')
@section('title')
Post-{{$post->title}}
@endsection
@section('content')



<div class="card text-bg-dark mb-3" style="max-width: 50rem;">
  <div class="card-header">Post Information</div>
  <div class="card-body">
    <h3 class="card-title">Title:- {{$post->title}}</h3>
    <h3 class="card-text">Description:-</h3>
     {{$post->description}}
  </div>
  </div>
<div class="card text-bg-dark mb-3" style="max-width: 50rem;">

  <div class="card-header">Post Creator Information</div>
  <div class="card-body">
    <h5 class="card-title">Name:- {{$post->user->name}}</h5>
        <h5 class="card-text">Email:- {{$post->user->email}}</h5>
        <h5 class="card-title">Created-At:- {{$post->created_at}}</h5>
  </div>
</div>
@endsection
