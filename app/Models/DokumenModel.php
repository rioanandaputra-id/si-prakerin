<?php

namespace App\Models;

use CodeIgniter\Model;
use Irsyadulibad\DataTables\DataTables;
class DokumenModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_dokumen';
    protected $primaryKey       = 'id_dokumen';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'judul_dokumen',
        'format_dokumen',
        'ukuran_dokumen',
        'path_dokumen',
        'upload_dokumen',
        'status_dokumen',
    ];
    protected $useTimestamps = false;

    public function dt()
    {
        $data = DataTables::use($this->table)
            ->make();
        return $data;
    }
}
