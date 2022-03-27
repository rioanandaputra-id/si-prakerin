<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AllSeeder extends Seeder
{
    public function run()
    {
        $this->call('UsersSeeder');
        $this->call('TahunAkademikSeeder');
        $this->call('ProdiSeeder');
        $this->call('PerusahaanSeeder');
        $this->call('MahasiswaSeeder');
        $this->call('PegawaiSeeder');
        $this->call('DokumenSeeder');
    }
}
