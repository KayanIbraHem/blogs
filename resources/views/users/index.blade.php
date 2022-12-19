@extends('layouts/app')
@section('title')
Users Information
@endsection
@section('content')
    <h2 align="center">From here you can view the user data you want</h2>
    <h3 align="center">Choose the user you want to view</h3><br />
    <div class="container" style="width:900px;">
        <div class="row">
            <div class="col-md-4">
                <select name="employee_list" id="employee_list" class="form-control">
                <option value="">Select Employee</option>
                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
                </select>
                </div>
                <div class="col-md-4">
                    <button type="button" name="search" id="search" class="btn btn-info">Search</button>
                    <!-- <button type="button" name="newuser" id="newuser" class="btn btn-primary">New User</button> -->
                </div>
            </div>
        <br />
        <div class="table-responsive" id="employee_details" style="display:none">
        <table class="table table-bordered">
            <tr>
                <td width="10%" align="right"><b>Name</b></td>
                <td width="90%"><span id="employee_name"></span></td>
            </tr>
            <tr>
                <td width="10%" align="right"><b>Address</b></td>
                <td width="90%"><span id="employee_address"></span></td>
            </tr>
            <tr>
                <td width="10%" align="right"><b>Gender</b></td>
                <td width="90%"><span id="employee_gender"></span></td>
            </tr>
            <tr>
                <td width="10%" align="right"><b>Email</b></td>
                <td width="90%"><span id="employee_email"></span></td>
            </tr>
            <tr>
                <td width="10%" align="right"><b>Type</b></td>
                <td width="90%"><span id="employee_type"></span></td>
            </tr>
        </table>
        </div>
       
        <div    id="users_form">
            <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">User Name</label>
                    <input type="text" value="{{old('name')}}" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('name') <div class="form-text text-danger" >{{ $message }}</div>  @enderror
                </div>
                <div class="mb-3">
                    <label for="inputPassword2" class="form-label">Password</label>
                    <input type="password" value="{{old('password')}}" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('password') <div class="form-text text-danger" >{{ $message }}</div>  @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Email</label>
                    <input type="text" value="{{old('email')}}" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputPassword1">
                    @error('email') <div class="form-text text-danger" >{{ $message }}</div>  @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Address</label>
                    <input type="text" value="{{old('address')}}" name="address" class="form-control @error('address') is-invalid @enderror" id="exampleInputPassword1">
                    @error('address') <div class="form-text text-danger" >{{ $message }}</div>  @enderror
                </div>
                <label class="form-label">Gender</label>
                <select class="form-select" aria-label="Default select example" name="gender_id">
                    <option value="0">Male</option>
                    <option value="1">Female</option>
                </select>
                <br>
                <label class="form-label">Type</label>
                <select class="form-select" aria-label="Default select example" name="user_type">
                    <option value="0">User</option>
                    <option value="1">Admin</option>
                </select>
                <br>
                <button type="submit" class="btn btn-primary" id="usercreate">New User</button>
            </form> 
        </div>
    </div>  
@endsection
@section('js')
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->
    <script src="{{asset('myjs/jquery.min.js')}}"></script>

<script>
$(document).ready(function(){
        $('#search').click(function(){
        var user_id= $('#employee_list').val()
        console.log(user_id)
            if(user_id)
            // console.log(user_id);
            {
                $.ajax({
                url:"{{ URL::to('users') }}/"+user_id, 
                method:"GET",
                dataType:"JSON",
                success:function(data)
                    {
                        $('#employee_details').css("display", "block");
                        $('#employee_name').text(data.name);
                        $('#employee_address').text(data.address);
                        $('#employee_gender').text(data.gender==0?'Male':'Female');
                        $('#employee_email').text(data.email);
                        $('#employee_type').text(data.is_admin==0?'User':'Admin');
                    }
                })
            }
            else
            {
            alert("Please Select Employee");
            $('#employee_details').css("display", "none");
            }
        });

        // $('#newuser').click(function(){
        // console.log('d')
        // $('#users_form').css("display", "block");
        // })


});


</script>
@endsection






