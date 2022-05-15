<?php

namespace App\Models;

use CodeIgniter\Model;
use Irsyadulibad\DataTables\DataTables;

class BimbinganJudulModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_bimbingan_judul';
    protected $primaryKey       = 'id_bimbingan_judul';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'judul_diajukan',
        'tanggal_diajukan',
        'status_bimbingan',
        'id_bimbingan',
    ];
    protected $useTimestamps = false;

    public function getBimbingan($id_mahasiswa = NULL)
    {
        $this->join('tb_bimbingan AS bimb', 'bimb.id_bimbingan = tb_bimbingan_judul.id_bimbingan');
        $this->join('tb_mahasiswa AS mhs', 'mhs.id_mahasiswa = bimb.id_mahasiswa');
        $this->join('tb_dosen AS dsn', 'dsn.id_dosen = bimb.id_dosen');
        if ($id_mahasiswa != NULL) {
            $this->where('mhs.id_mahasiswa', $id_mahasiswa);
        }
        return $this;
    }

    public function getDt($id_mahasiswa = NULL)
    {
        $data = DataTables::use('tb_bimbingan_judul')
            ->join('tb_bimbingan AS bimb', 'bimb.id_bimbingan = tb_bimbingan_judul.id_bimbingan')
            ->join('tb_mahasiswa AS mhs', 'mhs.id_mahasiswa = bimb.id_mahasiswa')
            ->join('tb_dosen AS dsn', 'dsn.id_dosen = bimb.id_dosen');
        if ($id_mahasiswa != NULL) {
            $data->where('mhs.id_mahasiswa', $id_mahasiswa);
        }
        return $data->make();
    }
}
