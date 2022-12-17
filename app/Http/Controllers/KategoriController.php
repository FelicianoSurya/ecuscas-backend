<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function store(request $request){
        $name = $request->name;
        
        $validate = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'image' => 'required|mimes:jpg,jpeg,png,gif|max:2048|image',
        ]);

        $destination_path = 'public/Images/Kategori';
        $image_path = 'http://192.168.168.51:8000/storage/Images/Kategori';
        $image = $request->file('image');
        $image_name = $image->getClientOriginalName();
        $path = $image->storeAs($destination_path,$image_name);

        $params = [
            'name' => $name,
            'image' => $image_path . '/' . $image_name
        ];

        Kategori::create($params);

        return response()->json([
            'message' => 'create category success',
            'data' => $params
        ]);
    }
}
