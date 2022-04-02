<?php

namespace App\Models;

use CodeIgniter\Model;
use Irsyadulibad\DataTables\DataTables;
class ProdiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_prodi';
    protected $primaryKey       = 'id_prodi';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_prodi',
        'nama_alias',
        'prodi_dibuat',
        'prodi_diubah',
    ];
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'prodi_dibuat';
    protected $updatedField  = 'prodi_diubah';

    public function dt()
    {
        $data = DataTables::use($this->table)
            ->make();
        return $data;
    }
}
