<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AllSeeder extends Seeder
{
    public function run()
    {
        $this->call('AkunSeeder');
        $this->call('TahunAkademikSeeder');
        $this->call('ProdiSeeder');
        $this->call('PerusahaanSeeder');
        $this->call('MahasiswaSeeder');
        $this->call('DosenSeeder');
        $this->call('DokumenSeeder');
        $this->call('BimbinganSeeder');
        $this->call('BimbinganJudulSeeder');
        $this->call('BimbinganJudulRiwayatSeeder');

    }
}
