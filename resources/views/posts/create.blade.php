@extends('layouts/app')
@section('title')
New-Post
@endsection
@section('content')
@if ($errors->any())
            <div class="alert alert-danger mt-5">   
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif 
<form class="mt-5" action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Tilte</label>
        <input type="text" value="{{old('title')}}" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <input  class="form-control" type="text" value="{{old('description')}}" name="description" id="exampleInputEmail1">
    </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Choice User</label>
        <select class="form-select" aria-label="Default select example" name="user_id">
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>

@endsection