<?php

namespace App\Models;

use CodeIgniter\Model;
use Irsyadulibad\DataTables\DataTables;

class DosenModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_dosen';
    protected $primaryKey       = 'id_dsn';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_dsn',
        'id_akun',
        'id_prodi',
        'nip_dsn',
        'nama_dsn',
        'jenkel_dsn',
        'tmpt_lahir_dsn',
        'tgl_lahir_dsn',
        'no_hp_dsn',
        'alamat_dsn',
        'status_dsn',
    ];
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'dibuat';
    protected $updatedField  = 'diperbarui';
    protected $prodi         = ['tb_program_studi', 'tb_dosen.id_prodi = tb_program_studi.id_prodi', 'LEFT JOIN'];
    protected $akun          = ['users', 'tb_dosen.id_akun = users.id', 'INNER JOIN'];

    public function dt()
    {
        $data = DataTables::use($this->table)
            ->join($this->prodi[0], $this->prodi[1], $this->prodi[2])
            ->join($this->akun[0], $this->akun[1], $this->akun[2])
            ->make();
        return $data;
    }
}
