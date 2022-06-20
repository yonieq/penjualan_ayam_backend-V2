<?php

namespace Database\Seeders;

use App\Models\SettingToko;
use Illuminate\Database\Seeder;

class SettingTokoSeeder extends Seeder
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
                'nama_toko' => 'Acho Tetew',
                'pemilik_toko' => 'Nasro'
                ]
        ];
        SettingToko::insert($data);
    }
}
