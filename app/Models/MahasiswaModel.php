<?php

namespace App\Models;

use CodeIgniter\Model;
use Irsyadulibad\DataTables\DataTables;

class MahasiswaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_mahasiswa';
    protected $primaryKey       = 'id_mahasiswa';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $useTimestamps = false;
    protected $allowedFields    = [
        'id_mahasiswa',
        'id_tahun_akademik',
        'id_akun',
        'id_prodi',
        'nim_mahasiswa',
        'nama_mahasiswa',
        'jenkel_mahasiswa',
        'tmpt_lahir_mahasiswa',
        'tgl_lahir_mahasiswa',
        'email_mahasiswa',
        'no_hp_mahasiswa',
        'alamat_mahasiswa',
        'nama_ortua',
        'no_hp_ortua',
    ];

    public function dt()
    {
        $data = DataTables::use('tb_mahasiswa')
            ->join('tb_tahun_akademik AS tahun', 'tb_mahasiswa.id_tahun_akademik = tahun.id_tahun_akademik', 'LEFT JOIN')
            ->join('tb_akun AS akun', 'tb_mahasiswa.id_akun = akun.id_akun', 'INNER JOIN')
            ->join('tb_prodi AS prodi', 'tb_mahasiswa.id_prodi = prodi.id_prodi', 'LEFT JOIN')
            ->make();
        return $data;
    }

    public function getStatus($status)
    {
        $data = $this->where('status_akun', $status)
            ->join('tb_tahun_akademik AS tahun', 'tb_mahasiswa.id_tahun_akademik = tahun.id_tahun_akademik', 'LEFT JOIN')
            ->join('tb_akun AS akun', 'tb_mahasiswa.id_akun = akun.id_akun', 'INNER JOIN')
            ->join('tb_prodi AS prodi', 'tb_mahasiswa.id_prodi = prodi.id_prodi', 'LEFT JOIN')
            ->get()->getResult();
        return $data;
    }

    public function getIdAkun($id)
    {
        $data = $this->where('id_akun', $id)->first();
        return $data;
    }
}
