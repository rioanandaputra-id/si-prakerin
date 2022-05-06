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

    public function getDt($status = false)
    {
        if ($status === false) {
        $data = DataTables::use($this->table)
            ->make();
        } else {
        $data = DataTables::use($this->table)
            ->where('status_perusahaan', 'Aktif')
            ->make();
        }
        return $data;
    }

    public function getStatus($status)
    {
        $data = $this->where($this->allowedFields[7], $status)->get()->getResult();
        return $data;
    }
}
