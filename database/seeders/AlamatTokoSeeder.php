<?php

namespace Database\Seeders;

use App\Models\AlamatToko;
use Illuminate\Database\Seeder;

class AlamatTokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'kabupaten_id' => '1',
                'kecamatan_id' => '1',
                'detail'=>'Jl. Gandaria No.4, Kraton, Kec. Tegal Bar., Kota Tegal, Jawa Tengah 52112',
                ]
        ];
        AlamatToko::insert($data);
    }
}
