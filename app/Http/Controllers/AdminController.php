<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderBarang;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index(){
        return view('home');
    }

    public function getCasing(){
        $data = Order::all();
        return view('listCasing',[
            'data' => $data,
        ]);
    }

    
    public function getAksesoris(){
        $data = OrderBarang::all();
        return view('listAksesoris',[
            'data' => $data,
        ]);
    }

    public function updateCasing(Request $request){
        $id = $request->id;
        $status = $request->status;

        $validate = Validator::make($request->all(),[
            'status' => 'required',
        ]);
        
        $barang = Order::where('id', $id)->first();

        $barang->fill([
            'status' => $status,
        ]);

        $barang->save();
        return back();
    }

    public function updateAksesoris(Request $request){
        $id = $request->id;
        $status = $request->status;

        $validate = Validator::make($request->all(),[
            'status' => 'required',
        ]);
        
        $barang = OrderBarang::where('id', $id)->first();

        $barang->fill([
            'status' => $status,
        ]);

        $barang->save();
        return back();
    }
}
