<?php

namespace App\Models;

use CodeIgniter\Model;
use Irsyadulibad\DataTables\DataTables;
class TahunAkademikModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_tahun_akademik';
    protected $primaryKey       = 'id_thn_akademik';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'thn_akademik',
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
