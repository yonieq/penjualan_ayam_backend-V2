<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    //
    public function get($id)
    {
        $keranjangs = DB::table('keranjangs')
                ->join('users', 'users.id', '=', 'keranjangs.user_id')
                ->join('products', 'products.id', '=', 'keranjangs.product_id')
                ->select('products.name as nama_produk', 'products.image', 'products.weigth', 'users.name', 'keranjangs.*', 'products.price')
                ->where('keranjangs.user_id', '=' ,$id)
                ->get();

        $beratTotal = 0;
        foreach($keranjangs as $k) {
            $berat = $k->weigth * $k->qty;
            $beratTotal = $beratTotal + $berat;
        }

        $kecamatan = DB::table('alamats')->where('user_id', $id)->get();
        $destinasi = $kecamatan[0]->kecamatan_id;

        $alamat_toko = DB::table('alamat_tokos')->first();

        $ongkir = Kecamatan::join('alamats', 'alamats.kecamatan_id', '=', 'kecamatans.id')
                ->where('alamats.user_id', $id)
                ->first('kecamatans.ongkir')->ongkir;
        

        $alamat_user = DB::table('alamats')
                        ->join('kecamatans', 'kecamatans.id', '=', 'alamats.kecamatan_id')
                        ->join('kabupatens', 'kabupatens.id', '=', 'kecamatans.kabupaten_id')
                        ->select('kabupatens.name as kabupatens', 'kecamatans.name as kecamatans', 'alamat.*')
                        ->where('alamats.user_id', $id)
                        ->first();

        $data = [
            'invoice' => 'INV-'.Date('YmdHis'),
            'keranjangs' => $keranjangs,
            'ongkir' => $ongkir,
            'alamat' => $alamat_user,
        ];

        return response([
            'status' => 'OK',
            'message' => 'Data Order',
            'data' => $data
        ], 200);
    }
}
