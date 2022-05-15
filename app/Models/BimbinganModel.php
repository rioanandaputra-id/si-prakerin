<?php

namespace App\Models;

use CodeIgniter\Model;
use Irsyadulibad\DataTables\DataTables;
class BimbinganModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_bimbingan';
    protected $primaryKey       = 'id_bimbingan';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_mahaasiswa',
        'id_dosen',
    ];
    protected $useTimestamps = false;
}
