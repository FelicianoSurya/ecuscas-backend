<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
                return response()->json(['message' => 'Password Salah!'], 400);
            }
        }else{
            return response()->json(['message' => 'Username atau Password Salah!'],400);
        }
    }

    public function register(Request $request){
        $username = $request['username'];
        $password = $request['password'];
        $name = $request['name'];
        $email = $request['email'];
        $address = $request['address'];
        $phone = $request['phone'];
        
        if($request->hasFile('image')){
            $validate = Validator::make($request->all(),[
                'username' => 'required|string|max:255',
                'password' => 'required|string|min:5',
                'email' => 'required|email|string|max:255',
                'image' => 'required|mimes:jpg,jpeg,png,gif|max:2048|image',
                'phone' => 'required|string|max:20',
            ]);
        }else{
            $validate = Validator::make($request->all(),[
                'username' => 'required|string|max:255',
                'password' => 'required|string|min:5',
                'email' => 'required|email|string|max:255',
                'phone' => 'required|string|max:20',
            ]);
        }


        if($request->hasFile('image')){
            $destination_path = 'public/Images/User';
            $image_path = 'http://192.168.0.110:8000/storage/Images/User';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $image->storeAs($destination_path,$image_name);
            $params = [
                'username' => $username,
                'name' => $name,
                'password' => Hash::make($password),
                'email' => $email,
                'address' => $address,
                'image' => $image_path . '/' . $image_name,
                'phone' => $phone
            ];
        }else{
            $params = [
                'username' => $username,
                'name' => $name,
                'password' => Hash::make($password),
                'email' => $email,
                'address' => $address,
                'phone' => $phone
            ];
        }

        $create = User::create($params);
        return response()->json($create);
    }
}
