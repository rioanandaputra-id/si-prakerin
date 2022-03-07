<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(HakAksesSeeder::class);
        $this->call(AkunSeeder::class);
    }
}
