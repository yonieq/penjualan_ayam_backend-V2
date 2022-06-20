<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Alamat;
use App\Models\Kecamatan;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function get($id)
    {
        $order = DB::table('orders')
                ->join('status_orders', 'status_orders.id', '=', 'orders.status_order_id')
                ->select('order.*', 'status_orders.name as status_name')
                ->where('orders.status_order_id', 1)
                ->where('orders.user_id', $id)
                ->get();
        
        $proses = DB::table('orders')
                ->join('status_orders', 'status_orders.id', '=', 'orders.status_order_id')
                ->select('order.*', 'status_orders.name as status_name')
                ->where('orders.status_order_id', '!=', 1)
                ->where('orders.status_order_id', '!=', 5)
                ->where('orders.status_order_id', '!=', 6)
                ->where('orders.user_id', $id)
                ->get();
        
        $histori = DB::table('orders')
                ->join('status_orders', 'status_orders.id', '=', 'orders.status_order_id')
                ->select('order.*', 'status_orders.name as status_name')
                ->where('orders.status_order_id', '!=', 1)
                ->where('orders.status_order_id', '!=', 2)
                ->where('orders.status_order_id', '!=', 3)
                ->where('orders.status_order_id', '!=', 4)
                ->where('orders.user_id', $id)
                ->get();
        
        $data = array(
            'order' => $order,
            'proses' => $proses,
            'histori' => $histori
        );

        return response([
            'message' => 'List Pemesanan',
            'data' => $data
        ], 200);
    }

    public function post(Request $request, $id)
    {
        $cekAlamat = Alamat::where('user_id', $id)->count();

        if($cekAlamat > 0) {
            $ongkir = Kecamatan::join('alamats', 'alamats.kecamatan_id', '=', 'kecamatans.id')
                        ->where('alamats.user_id', $id)
                        ->first('kecamatans.ongkir')->ongkir;
            $data = new Order;
            $data->invoice = $request->invoice;
            $data->statu_order_id = $request->status_order_id;
            $data->metode_pembayaran = $request->metode_pembayaran;
            $data->ongkir = $ongkir;
            $data->pesan = $request->pesan;
            $data->no_hp = $request->no_hp;
            $data->user_id = $id;
            $data->save();

            return response([
                'status' => 'OK',
                'message' => 'Pemesanan berhasil dibuat',
                'data' => $data
            ], 200);
        } else {
            return response([
                'status' => 'OK',
                'message' => 'Anda belum memiliki alamat',
            ], 200);
        }
    }
    
}
