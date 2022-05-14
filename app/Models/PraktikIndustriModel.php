<?php

namespace App\Models;

use CodeIgniter\Model;
use Irsyadulibad\DataTables\DataTables;

class PraktikIndustriModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_praktik_industri';
    protected $primaryKey       = 'id_praktik_industri';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $useTimestamps = false;
    protected $allowedFields    = [
        'id_praktik_industri',
        'id_perusahaan',
        'id_mahasiswa',
        'status_praktik_industri',
        'waktu_awal_praktik_industri',
        'waktu_akhir_praktik_industri',
    ];

    public function getDt($id = null)
    {
        if ($id != null) {
            $data = DataTables::use('tb_praktik_industri')
                ->join('tb_perusahaan AS prh', 'prh.id_perusahaan = tb_praktik_industri.id_perusahaan', 'left')
                ->join('tb_mahasiswa AS mhs', 'mhs.id_mahasiswa = tb_praktik_industri.id_mahasiswa', 'left')
                ->join('tb_akun AS akn', 'akn.id_akun = mhs.id_akun', 'left')
                ->join('tb_tahun_akademik AS thn', 'thn.id_tahun_akademik = mhs.id_tahun_akademik', 'left')
                ->join('tb_prodi AS prd', 'prd.id_prodi = mhs.id_prodi', 'left')
                ->where('tb_praktik_industri.id_mahasiswa', $id)
                ->make();
        } else {
            $data = DataTables::use('tb_praktik_industri')
                ->join('tb_perusahaan AS prh', 'prh.id_perusahaan = tb_praktik_industri.id_perusahaan', 'left')
                ->join('tb_mahasiswa AS mhs', 'mhs.id_mahasiswa = tb_praktik_industri.id_mahasiswa', 'left')
                ->join('tb_akun AS akn', 'akn.id_akun = mhs.id_akun', 'left')
                ->join('tb_tahun_akademik AS thn', 'thn.id_tahun_akademik = mhs.id_tahun_akademik', 'left')
                ->join('tb_prodi AS prd', 'prd.id_prodi = mhs.id_prodi', 'left')
                ->make();
        }
        return $data;
    }

    public function getDtDetail($id)
    {
        $data = $this->where('id_praktik_industri', $id)
            ->join('tb_perusahaan AS prh', 'prh.id_perusahaan = tb_praktik_industri.id_perusahaan', 'left')
            ->join('tb_mahasiswa AS mhs', 'mhs.id_mahasiswa = tb_praktik_industri.id_mahasiswa', 'left')
            ->join('tb_akun AS akn', 'akn.id_akun = mhs.id_akun', 'left')
            ->join('tb_tahun_akademik AS thn', 'thn.id_tahun_akademik = mhs.id_tahun_akademik', 'left')
            ->join('tb_prodi AS prd', 'prd.id_prodi = mhs.id_prodi', 'left')
            ->get()->getResult();
        return $data;
    }
}
