<?php

namespace App\Models;

use CodeIgniter\Model;
use Irsyadulibad\DataTables\DataTables;
class BimbinganJudulRiwayatModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_bimbingan_judul_riwayat';
    protected $primaryKey       = 'id_bimbingan_judul_riwayat';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'keterangan',
        'tanggal_bimbingan',
        'id_bimbingan_judul',
        'id_dokumen',
    ];
    protected $useTimestamps = false;
}
