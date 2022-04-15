<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunModel extends Model
{
    protected $table            = 'tb_akun';
    protected $primaryKey       = 'id_akun';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'id_akun',
        'username',
        'password',
        'peran_akun',
        'status_akun',
    ];
    protected $useTimestamps = false;
}
