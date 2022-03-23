<?php

namespace App\Models;

use CodeIgniter\Model;
use Irsyadulibad\DataTables\DataTables;

class PerusahaanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_perusahaan';
    protected $primaryKey       = 'id_perusahaan';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_perusahaan',
        'alamat_perusahaan',
        'telp_perusahaan',
        'email_perusahaan',
        'web_perusahaan',
        'long_perusahaan',
        'lat_perusahaan',
        'status_perusahaan',
    ];
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'dibuat';
    protected $updatedField  = 'diperbarui';

    public function dt()
    {
        $data = DataTables::use($this->table)
            ->make();
        return $data;
    }
}
