<?php

namespace App\Models;

use CodeIgniter\Model;
use Irsyadulibad\DataTables\DataTables;
class ProgramStudiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_program_studi';
    protected $primaryKey       = 'id_program_studi';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_program_studi',
        'nama_alias',
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
