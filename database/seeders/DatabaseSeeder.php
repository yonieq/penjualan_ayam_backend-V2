<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(KabupatenSeeder::class);
        $this->call(KecamatanSeeder::class);
        $this->call(OrderStatusSeeder::class);
        $this->call(SettingTokoSeeder::class);
        $this->call(AlamatTokoSeeder::class);
        $this->call(RekeningSeeder::class);
    }
}
