<?php

namespace App\Models;

use CodeIgniter\Model;
use Irsyadulibad\DataTables\DataTables;

class PegawaiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_pegawai';
    protected $primaryKey       = 'id_pegawai';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_pegawai',
        'id_akun',
        'id_prodi',
        'nip_pegawai',
        'nama_pegawai',
        'jenkel_pegawai',
        'tmpt_lahir_pegawai',
        'tgl_lahir_pegawai',
        'no_hp_pegawai',
        'alamat_pegawai',
        'status_pegawai',
    ];
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'pegawai_dibuat';
    protected $updatedField  = 'pegawai_diubah';
    protected $prodi         = ['tb_program_studi', 'tb_pegawai.id_prodi = tb_program_studi.id_prodi', 'LEFT JOIN'];
    protected $akun          = ['users', 'tb_pegawai.id_akun = users.id', 'INNER JOIN'];

    public function dt()
    {
        $data = DataTables::use($this->table)
            ->join($this->prodi[0], $this->prodi[1], $this->prodi[2])
            ->join($this->akun[0], $this->akun[1], $this->akun[2])
            ->make();
        return $data;
    }
}
