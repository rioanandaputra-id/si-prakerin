<?php

namespace App\Models;

use CodeIgniter\Model;
use Irsyadulibad\DataTables\DataTables;

class DosenModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_dosen';
    protected $primaryKey       = 'id_dosen';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_dosen',
        'id_akun',
        'id_prodi',
        'nip_dosen',
        'nama_dosen',
        'jenkel_dosen',
        'tmpt_lahir_dosen',
        'tgl_lahir_dosen',
        'no_hp_dosen',
        'alamat_dosen',
    ];
    protected $useTimestamps = false;

    public function dt()
    {
        $data = DataTables::use('tb_dosen')
            ->join('tb_prodi AS prodi', 'tb_dosen.id_prodi = prodi.id_prodi', 'LEFT JOIN')
            ->join('tb_akun AS akun', 'tb_dosen.id_akun = akun.id_akun', 'INNER JOIN')
            ->make();
        return $data;
    }

    public function getIdAkun($id)
    {
        $data = $this->where('id_akun', $id)->first();
        return $data;
    }
}
