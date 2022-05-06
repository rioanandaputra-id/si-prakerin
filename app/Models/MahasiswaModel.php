<?php

namespace App\Models;

use CodeIgniter\Model;
use Irsyadulibad\DataTables\DataTables;

class MahasiswaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_mahasiswa';
    protected $primaryKey       = 'id_mahasiswa';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $useTimestamps = false;
    protected $allowedFields    = [
        'id_mahasiswa',
        'id_tahun_akademik',
        'id_akun',
        'id_prodi',
        'nim_mahasiswa',
        'nama_mahasiswa',
        'jenkel_mahasiswa',
        'tmpt_lahir_mahasiswa',
        'tgl_lahir_mahasiswa',
        'email_mahasiswa',
        'no_hp_mahasiswa',
        'alamat_mahasiswa',
        'nama_ortua',
        'no_hp_ortua',
    ];
    protected $join = [
        'tb_tahun_akademik',
        'tb_akun', 
        'tb_prodi'
    ];
    
    public function dt()
    {
        $data = DataTables::use($this->table)
            ->join($this->join[0], $this->table . '.'.$this->allowedFields[1].' = ' . $this->join[0] . '.'.$this->allowedFields[1], 'LEFT')
            ->join($this->join[1], $this->table . '.'.$this->allowedFields[2].' = ' . $this->join[1] . '.'.$this->allowedFields[2], 'LEFT')
            ->join($this->join[2], $this->table . '.'.$this->allowedFields[3].' = ' . $this->join[2] . '.'.$this->allowedFields[3], 'LEFT')
            ->make();
        return $data;
    }

    public function getStatus($status)
    {
        $data = $this->where('status_akun', $status)
        ->join($this->join[0], $this->table . '.'.$this->allowedFields[1].' = ' . $this->join[0] . '.'.$this->allowedFields[1], 'LEFT')
        ->join($this->join[1], $this->table . '.'.$this->allowedFields[2].' = ' . $this->join[1] . '.'.$this->allowedFields[2], 'LEFT')
        ->join($this->join[2], $this->table . '.'.$this->allowedFields[3].' = ' . $this->join[2] . '.'.$this->allowedFields[3], 'LEFT')  
        ->get()->getResult();
        return $data;
    }
}
