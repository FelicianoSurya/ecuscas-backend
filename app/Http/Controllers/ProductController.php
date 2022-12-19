<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function getProduct(){
        $data = Product::all();
        return response()->json([
            'dataProduct' => $data
        ],200);
    }

    public function storeProduct(Request $request){
        $name = $request->name;
        $harga = $request->harga;
        $jumlah = $request->jumlah;

        $destination_path = 'storage/Images/Product';
        $image_path = 'https://e-cuscas.biz.id/storage/Images/Product';
        $image = $request->file('image');
        $image_name = $image->getClientOriginalName();
        $path = $image->storeAs($destination_path,$image_name);

        $params = [
            'name' => $name,
            'harga' => $harga,
            'jumlah' => $jumlah,
            'image' => $image_path . '/' . $image_name
        ];

        Product::create($params);
        return response()->json([
            'Message' => 'product berhasil di masukan!',
            'product' => $params,
        ]);
    }
}
