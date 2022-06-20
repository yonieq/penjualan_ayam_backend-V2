<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data1 = 
        [
            'kabupaten_id' => '1',
            'ongkir' => '10000',
            'name' => 'Slawi',
        ];
        Kecamatan::insert($data1);

        $data2 = 
        [
            'kabupaten_id' => '1',
            'ongkir' => '15000',
            'name' => 'Pangkah',
        ];
        Kecamatan::insert($data2);

        $data3 = 
        [
            'kabupaten_id' => '1',
            'ongkir' => '12000',
            'name' => 'Talang',
        ];
        Kecamatan::insert($data3);

        $data4 = 
        [
            'kabupaten_id' => '1',
            'ongkir' => '11000',
            'name' => 'Adiwerna',
        ];
        Kecamatan::insert($data4);

        $data5 = 
        [
            'kabupaten_id' => '1',
            'ongkir' => '16000',
            'name' => 'Tarub',
        ];
        Kecamatan::insert($data5);

        $data6 = 
        [
            'kabupaten_id' => '1',
            'ongkir' => '18000',
            'name' => 'Kramat',
        ];
        Kecamatan::insert($data6);

        $data7 = 
        [
            'kabupaten_id' => '1',
            'name' => 'Dukuhturi',
            'ongkir' => '20000',
        ];
        Kecamatan::insert($data7);
    }
}
