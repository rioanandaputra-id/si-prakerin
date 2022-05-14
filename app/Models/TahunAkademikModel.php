<?php

namespace App\Models;

use CodeIgniter\Model;
use Irsyadulibad\DataTables\DataTables;
class TahunAkademikModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_tahun_akademik';
    protected $primaryKey       = 'id_tahun_akademik';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'tahun_akademik',
        'status_tahun_akademik',
    ];
    protected $useTimestamps = false;

    public function dt()
    {
        $data = DataTables::use('tb_tahun_akademik')
            ->make();
        return $data;
    }
}
