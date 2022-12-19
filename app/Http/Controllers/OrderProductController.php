<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ongkir;
use App\Models\Voucher;
use App\Models\OrderBarangDetail;
use App\Models\OrderBarang;
use App\Models\OrderBarangFix;
use Illuminate\Support\Facades\Validator;

class OrderProductController extends Controller
{
    public function getData($iduser){
        $data = OrderBarang::where("id_user",$iduser)->get();
        return response()->json([
            'order_barang' => $data,
        ],200);
    }

    public function store(Request $request){
        $id_user = $request->id_user;
        $pembayaran = $request->pembayaran;
        $ongkir = $request->ongkir;
        $voucher = $request->voucher;
        $keterangan = $request->keterangan;
        $address = $request->address;

        $row = OrderBarang::get();
        $row = count($row) + 1;
        
        $data = User::with('detail_barang')->where('id', $id_user)->first();
        $total = $data->detail_barang->sum('harga');
        $diskon = $voucher * $total;
        
        $harga_total = ($total + $ongkir) - $diskon;

        $validate = Validator::make($request->all(),[
            'id_user' => 'required',
            'pembayaran' => 'required',
            'ongkir' => 'required',
            'voucher' => 'required',
            'address' => 'required',
        ]);
        
        if($validate->fails()){
            return response()->json([
                'message' => $validate->errors(),
            ]);
        }else{
            $params = [
                'kode_order' => 'OR-' .  $row,
                'id_user' => $id_user,
                'voucher' => $voucher,
                'pembayaran' => $pembayaran,
                'ongkir' => $ongkir,
                'diskon' => $diskon,
                'harga' => $total,
                'harga_total' => $harga_total,
                'ket' => $keterangan,
                'address' => $address
            ];

            OrderBarang::create($params);
            OrderBarangDetail::query()->get()->each(function($oldRecord){
                $newPost = $oldRecord->replicate();
                $newPost->setTable('order_detail_fix');
                $newPost->save();
                $oldRecord->delete();
            });
            return response()->json([
                'message' => 'Order berhasil!',
                'order' => $params,
            ]);
        }
    }
}
