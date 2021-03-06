<?php

namespace App\Models;

use CodeIgniter\Model;

class PraktikIndustriNilaiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_praktik_industri_nilai';
    protected $primaryKey       = 'id_praktik_industri_nilai';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $useTimestamps = false;
    protected $allowedFields    = [
        'nilai_praktik_industri',
        'id_praktik_industri_nilai',
        'id_praktik_industri',
        'id_dokumen',
        'status_praktik_industri_nilai',
    ];
}
