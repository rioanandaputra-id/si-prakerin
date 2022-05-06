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
    protected $prodi         = ['tb_prodi', 'tb_dosen.id_prodi = tb_prodi.id_prodi', 'LEFT JOIN'];
    protected $akun          = ['tb_akun', 'tb_dosen.id_akun = tb_akun.id_akun', 'INNER JOIN'];

    public function dt()
    {
        $data = DataTables::use($this->table)
            ->join($this->prodi[0], $this->prodi[1], $this->prodi[2])
            ->join($this->akun[0], $this->akun[1], $this->akun[2])
            ->make();
        return $data;
    }

    public function getIdAkun($id)
    {
        $data = $this->where('id_akun', $id)->first();
        return $data;
    }
}
