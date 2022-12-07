<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request){
        $username = $request['username'];
        $password = $request['password'];

        $user = User::where('username',$username)->first();
        
        if($user){
            $check = Hash::check($password, $user->password);
            if($check){
                return response()->json($user);
            }else{
                return response()->json(['message' => 'Password Salah!']);
            }
        }else{
            return response()->json(['message' => 'Username atau Password Salah!']);
        }
    }

    public function register(Request $request){
        $username = $request['username'];
        $password = $request['password'];
        $name = $request['name'];
        $email = $request['email'];
        $address = $request['address'];
        $phone = $request['phone'];

        $params = [
            'username' => $username,
            'name' => $name,
            'password' => Hash::make($password),
            'email' => $email,
            'address' => $address,
            'phone' => $phone
        ];

        $create = User::create($params);
        return response()->json($create);
    }
}
