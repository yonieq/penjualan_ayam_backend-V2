<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Alamat;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AlamatController extends Controller
{
    //
    public function alamat()
    {
        $id_user = auth()->user();

        $cek_alamat = Alamat::where('user_id', $id_user)->count();

        if($cek_alamat > 0)
        {
            $data = DB::table('alamats')
            ->join('kecamatans', 'kecamatans.id', '=', 'alamats.kecamatan_id')
            ->join('kabupatens', 'kabupatens.id', '=', 'kecamatans.kabupaten_id')
            ->select('kabupatens.name as kabupatens', 'kecamatans.name as kecamatans', 'alamat.*')
            ->where('alamats.user_id', $id_user)
            ->first();

            return response([
                'status' => 'OK',
                'message' => 'Alamat anda',
                'data' => $data
            ], 200);
        } else  
        {
            return response([
                'message' => 'Silahkan atur alamat anda dulu',
            ], 200);
        }
    }

    public function create(Request $request)
    {
        $kecamatan_id = Kecamatan::where('name', $request->kecamatans)->first('id')->id;
        $kabupaten_id = Kabupaten::where('name', $request->kabupatens)->first('id')->id;
        $data = new Alamat;
        $data->kecamatan_id = $kecamatan_id;
        $data->kabupaten_id = $kabupaten_id;
        $data->detail = $request->detail;
        $data->user_id = auth()->user()->id;
        $data->save();

        return response([
            'status' => 'OK',
            'message' => 'Alamat anda telah diatur',
            'data' => $data
        ], 200);
    }

    public function ubah()
    {
        $data = Alamat::join('kecamatans', 'kecamatans.id', '=', 'alamats.kecamatan_id')->where('alamats.user_id', auth()->user()->id)->first(['alamats.id', 'alamats.detail', 'kecamatans.name as kecamatans']);
        return response([
            'status' => 'OK',
            'message' => 'Alamat anda',
            'data' => $data
        ], 200);
    }

    public function update($id ,Request $request)
    {
        $input = Alamat::findOrFail($id);

        $input->update([
            'kabupaten_id' => $request->kabupaten_id,
            'kecamatan_id' => $request->kecamatan_id,
            'detail' => $request
        ]);

        return response([
            'message' => 'Data berhasil dirubah',
            'data' => $input
        ], 200);

    }
}
