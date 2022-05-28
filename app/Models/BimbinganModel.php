<?php

namespace App\Models;

use CodeIgniter\Model;
use Irsyadulibad\DataTables\DataTables;

class BimbinganModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_bimbingan';
    protected $primaryKey       = 'id_bimbingan';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_mahaasiswa',
        'id_dosen',
    ];
    protected $useTimestamps = false;

    public function getMahasiswaIdCount($id_mahasiswa)
    {
        $data = $this->where('id_mahasiswa', $id_mahasiswa)
            ->countAllResults();
        return $data;
    }

    public function getDetail($id_mahasiswa = NULL)
    {
        $data = $this->select('tb_bimbingan.*, tb_mahasiswa.nama_mahasiswa, tb_dosen.nama_dosen')
            ->join('tb_mahasiswa', 'tb_mahasiswa.id_mahasiswa = tb_bimbingan.id_mahasiswa')
            ->join('tb_dosen', 'tb_dosen.id_dosen = tb_bimbingan.id_dosen');
            if ($id_mahasiswa != NULL) {
                $data = $data->where('tb_bimbingan.id_mahasiswa', $id_mahasiswa);
            }
        return $data->findAll();
    }
}
