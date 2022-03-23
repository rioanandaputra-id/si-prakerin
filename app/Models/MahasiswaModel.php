<?php

namespace App\Models;

use CodeIgniter\Model;
use Irsyadulibad\DataTables\DataTables;

class MahasiswaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_mahasiswa';
    protected $primaryKey       = 'id_mhs';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_mhs',
        'id_thn_akademik',
        'id_akun',
        'id_prodi',
        'nim_mhs',
        'nama_mhs',
        'jenkel_mhs',
        'tmpt_lahir_mhs',
        'tgl_lahir_mhs',
        'no_hp_mhs',
        'alamat_mhs',
        'status_mhs',
        'nama_ortua',
        'no_hp_ortua',
    ];
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'dibuat';
    protected $updatedField  = 'diperbarui';
    protected $thn_akademik  = ['tb_tahun_akademik', 'tb_mahasiswa.id_thn_akademik = tb_tahun_akademik.id_thn_akademik', 'LEFT JOIN'];
    protected $akun          = ['users', 'tb_mahasiswa.id_akun = users.id', 'INNER JOIN'];
    protected $prodi         = ['tb_program_studi', 'tb_mahasiswa.id_prodi = tb_program_studi.id_prodi', 'LEFT JOIN'];

    public function dt()
    {
        $data = DataTables::use($this->table)
            ->join($this->akun[0], $this->akun[1], $this->akun[2])
            ->join($this->thn_akademik[0], $this->thn_akademik[1], $this->thn_akademik[2])
            ->join($this->prodi[0], $this->prodi[1], $this->prodi[2])
            ->make();
        return $data;
    }
}
