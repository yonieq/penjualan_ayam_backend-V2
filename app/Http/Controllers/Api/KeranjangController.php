<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    //
    public function get($id )
    {
        $data = Keranjang::join('products', 'products.id', '=', 'keranjangs.product_id')
                ->where('keranjangs.user_id', $id)
                ->get(['products.name',
                       'products.price',
                       'keranjangs.id',
                       'keranjangs.qty',
                       'products.image',
                    ]);
        return response([
            'message' => 'List Keranjang',
            'data' => $data
        ], 200);
    }

    public function post(Request $request)
    {
        $data = new Keranjang;
        $data->user_id = auth()->user()->id;
        $data->product_id = $request->product_id;
        $data->qty = $request->qty;
        $data->save();

        return response([
            'status' => 'OK',
            'message' => 'Berhasil menambahkan ke keranjang',
            'data' => $data
        ], 200);
    }

    public function tambah($id)
    {
        $qty = Keranjang::where('id', $id)->first('qty')->qty;

        $keranjang = Keranjang::findOrFail($id);
        $keranjang->qty = $qty + 1;
        $keranjang->save();

        return response([
            'status' => 'OK',
            'message' => 'Jumlah ditambahkan',
            'data' => $keranjang
        ], 200);
    }

    public function kurang($id)
    {
        $qty = Keranjang::where('id', $id)->first('qty')->qty;
        if($qty==1) {
            return response([
                'status' => 'OK',
                'message' => 'Jumlah mencapai batas minimal',
            ], 200);
        }

        $keranjang = Keranjang::findOrFail($id);
        $keranjang->qty = $qty - 1;
        $keranjang->save();

        return response([
            'status' => 'OK',
            'message' => 'Jumlah dikurangi',
            'data' => $keranjang
        ], 200);
    }

    public function delete($id)
    {
        $data = Keranjang::findOrFail($id);
        $data->delete();
        return response([
            'status' => 'OK',
            'message' => 'Produk berhasil dihapus dari keranjang',
            'data' => $data
        ], 200);
    }
}
