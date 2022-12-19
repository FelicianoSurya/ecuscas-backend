<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Voucher;
use App\Models\Pembayaran;
use App\Models\Ongkir;
use App\Models\OrderDetailFix;
use App\Models\JenisBarang;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function getCategory(){
        $data = Kategori::all();
        return response()->json([
            "dataCategpry" => $data
        ],200);
    }

    public function getVoucher(){
        $data = Voucher::all();
        return response()->json([
            "dataVoucher" => $data
        ],200);
    }

    public function getPembayaran(){
        $data = Pembayaran::all();
        return response()->json([
            'dataPembayaran' => $data
        ],200);
    }

    public function getOngkir(){
        $data = Ongkir::all();
        return reponse()->json([
            'dataOngkir' => $data
        ],200);
    }

    public function getJenisBarang(Request $request){
        $idKategori = $request->idKategori;
        $data = Kategori::with('jenis_barang')->where('id',$idKategori)->get();
        
        return response()->json([
            'dataJenisBarang' => $data,
        ],200);
    }

    public function getDetailBarang(Request $request){
        $kode_order = $request->kode_order;
        $data = OrderDetailFix::where('kode_order',$kode_order)->get();
        return response()->json([
            'get_detail_barang' => $data,
        ]);
    }
}
