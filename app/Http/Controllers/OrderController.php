<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class OrderController extends Controller
{
    public function getData($id_user){
        $data = Order::where('id_user',$id_user)->get();
        return response()->json([
            'dataOrder' => $data,
        ],200);
    }

    public function storeOrder(Request $request){
        $id_user = $request->id_user;
        $id_kategori = $request->id_kategori;
        $pembayaran = $request->pembayaran;
        $aksesoris = $request->aksesoris;
        $ongkir = $request->ongkir;
        $jenis_barang = $request->jenis_barang;
        $warna = $request->warna;
        $voucher = $request->voucher;
        $bahan = $request->bahan;
        $address = $request->address;
        $keterangan = $request->keterangan;
        $panjang = $request->panjang;
        $lebar = $request->lebar;
        $tinggi = $request->tinggi;
        $ukuran = $panjang * $lebar * $tinggi;
        if($ukuran > 50){
            $harga = 50000;
        }else if($ukuran > 100){
            $harga = 100000;
        }else if($ukuran > 200){
            $harga = 200000;
        }else{
            $harga = 300000;
        }

        $diskon = $harga * $voucher;
        $harga_total = $harga - $diskon + $ongkir;

        $validate = Validator::make($request->all(),[
            'id_user' => 'required',
            'pembayaran' => 'required',
            'id_kategori' => 'required',
            'aksesoris' => 'required',
            'ongkir' => 'required',
            'jenis_barang' => 'required',
            'warna' => 'required',
            'bahan' => 'required',
            'address' => 'required',
            'voucher' => 'required',
        ]);

        if($request->gambar != ""){
            $destination_path = 'storage/Images/Order' . str::random(20) . '.jpg';
            $image_path = 'https://e-cuscas.biz.id/' . $destination_path;

            $ifp = fopen(public_path($destination_path) , 'wb');
            fwrite($ifp, base64_decode($request->gambar));
            fclose($ifp);
    
            $params = [
                'id_user' => $id_user,
                'pembayaran' => $pembayaran,
                'id_kategori' => $id_kategori,
                'aksesoris' => $aksesoris,
                'ongkir' => $ongkir,
                'jenis_barang' => $jenis_barang,
                'warna' => $warna,
                'panjang' => $panjang,
                'lebar' => $lebar,
                'tinggi' => $tinggi,
                'bahan' => $bahan,
                'address' => $address,
                'diskon' => $diskon,
                'keterangan' => $keterangan,
                'total_harga' => $harga_total,
                'gambar' => $image_path,
            ];
        }else{
            $params = [
                'id_user' => $id_user,
                'pembayaran' => $pembayaran,
                'id_kategori' => $id_kategori,
                'aksesoris' => $aksesoris,
                'ongkir' => $ongkir,
                'jenis_barang' => $jenis_barang,
                'warna' => $warna,
                'bahan' => $bahan,
                'panjang' => $panjang,
                'lebar' => $lebar,
                'tinggi' => $tinggi,
                'address' => $address,
                'diskon' => $diskon,
                'keterangan' => $keterangan,
                'total_harga' => $harga_total,
            ];
        }

        Order::create($params);

        return response()->json([
            'message' => 'create order success',
        ]);
    }
}