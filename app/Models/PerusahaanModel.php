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
    
    public function getDt($status)
    {
        if ($status == false) {
            $data = DataTables::use($this->table)
                ->where('status_perusahaan', 'Tidak Aktif')
                ->make();
        } else {
            $data = DataTables::use($this->table)
                ->where('status_perusahaan', 'Aktif')
                ->make();
        }
        return $data;
    }

    public function getAkun()
    {
        $this->select('tb_perusahaan.*, pembuat.username AS username_pembuat, pengubah.username AS username_pengubah');
        $this->join('users AS pembuat', 'pembuat.id = tb_perusahaan.id_pembuat_perusahaan', 'left');
        $this->join('users AS pengubah', 'pengubah.id = tb_perusahaan.id_pengubah_perusahaan', 'left');
        return $this;
    }
}
