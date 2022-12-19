<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\OrderBarangDetail;
use App\Models\OrderBarang;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class OrderDetailController extends Controller
{
    public function getOrderDetail($iduser){
        $data = User::with(['detail_barang'])->where('id',$iduser)->get();
        return response()->json([
            'dataOrderDetail' => $data,
        ]);
    }

    public function storeOrderDetail(Request $request){
        $validate = Validator::make($request->all(),[
            'id_barang' => 'required',
            'id_user' => 'required',
        ]);
        $row = OrderBarang::get();
        $row = count($row) + 1;
        $kode_order = 'OR-' . $row;
        $id_barang = $request->id_barang;
        $id_user = $request->id_user;
        $harga_satuan = Product::find($id_barang);
        $cek = OrderBarangDetail::where('kode_order',$kode_order)->where('id_barang',$id_barang)->first();
        if($cek){
            $jumlah = $cek->jumlah + 1;
            $total = $harga_satuan->harga * $jumlah;
            if($validate->fails()){
            return response()->json([
                'errors' => $validate->errors(),
            ],401);
        }else{
            $params = [
                'jumlah' => $jumlah,
                'harga' => $total,
            ];
            
            $cek->fill($params);
            $cek->save();

            return response()->json([
                'message' => 'barang berhasil ditambahkan'
            ]);
        }

        }else{
            $jumlah = 1;
            $total = $harga_satuan->harga * $jumlah;
            if($validate->fails()){
                return response()->json([
                    'errors' => $validate->errors(),
                ],401);
            }else{
                $params = [
                    'kode_order' => $kode_order,
                    'id_barang' => $id_barang,
                    'id_user' => $id_user,
                    'jumlah' => $jumlah,
                    'harga' => $total,
                ];
                
                OrderBarangDetail::create($params);
    
                return response()->json([
                    'message' => 'barang berhasil masuk cart',
                    'dataOrderDetail' => $params,
                ]);
            }
        }
    }

    public function deleteDetailBarang(Request $request){
        $id_user = $request->id_user;
        $id_barang = $request->id_barang;

        $orderDetail = OrderBarangDetail::where('id_user', $id_user)->where('id_barang', $id_barang)->first();
        if($orderDetail){
            $orderDetail->delete();
            return response()->json([
                'message' => 'Data berhasil dihapus',
            ],200);
        }else{
            return response()->json([
                'message' => 'Data tidak ada!'
            ],501);
        }
    }

    public function updateDetailBarang(Request $request){
        $id = $request->id;
        $stat = $request->stat;
        
        $data = OrderBarangDetail::find($id);
        $id_barang = $data->id_barang;
        $barang = Product::find($id_barang);

        if($stat == '+'){    
            $jumlah = $data->jumlah + 1;
            $total = $jumlah * $barang->harga;
            $data->fill([
                'jumlah' => $jumlah,
                'harga' => $total,
            ]);
        }else{
            $jumlah = $data->jumlah - 1;
            $total = $jumlah * $barang->harga;
            $data->fill([
                'jumlah' => $jumlah,
                'harga' => $total
            ]);
        }

        $data->save();
        return response()->json([
            'message' => 'Data berhasil di Update',
        ],200);
    }
}
