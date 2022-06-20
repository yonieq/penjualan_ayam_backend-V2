<?php

namespace Database\Seeders;

use App\Models\Rekening;
use Illuminate\Database\Seeder;

class RekeningSeeder extends Seeder
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
                'name' => 'BNI',
                'atas_nama' => 'Nasro',
                'no_rekening' => '166982369',
                ]
        ];
        Rekening::insert($data);
    }
}
