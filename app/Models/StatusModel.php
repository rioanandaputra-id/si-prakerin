<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_status';
    protected $primaryKey       = 'id_status';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_status',
        'status',
    ];
    protected $useTimestamps = false;
}
