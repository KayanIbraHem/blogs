<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
class UserController extends Controller
{
    public function index()
    {
    return view('users.index',[
    'users'=>User::all()
    ]);
    }
    public function show($id)
    {
        $users=User::where('id','=',$id)->first();
        return response()->json($users);
    }
    public function store(UserRequest $request)
    {
        $user=New User();
        $user->name=$request->name;
        $user->password=\Hash::make($request->password);
        $user->email=$request->email;
        $user->address=$request->address;
        $user->gender=$request->gender_id;
        $user->is_admin=$request->user_type;
        $user->save();
        return redirect()->route('users.index');

    }
   
}
