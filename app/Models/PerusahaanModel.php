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
        'perusahaan_dibuat',
        'perusahaan_diubah',
        'id_pembuat_perusahaan',
        'id_pengubah_perusahaan',
    ];
    protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'perusahaan_dibuat';
    // protected $updatedField  = 'perusahaan_diubah';

    public function dt($status)
    {
        if ($status == 0) {
            $data = DataTables::use($this->table)
                ->where('status_perusahaan', 'Baru')
                ->make();
        } else {
            $data = DataTables::use($this->table)
                ->where('status_perusahaan', 'Diterima')
                ->orWhere('status_perusahaan', 'Ditolak')
                ->make();
        }
        return $data;
    }
}
