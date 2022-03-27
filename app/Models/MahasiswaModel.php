<?php

namespace App\Models;

use CodeIgniter\Model;
use Irsyadulibad\DataTables\DataTables;

class MahasiswaModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'tb_mahasiswa';
    protected $primaryKey       = 'id_mahasiswa';
    protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    // protected $allowedFields    = [
    //     'id_mahasiswa',
    //     'id_tahun_akademik',
    //     'id_akun',
    //     'id_prodi',
    //     'nim_mahasiswa',
    //     'nama_mahasiswa',
    //     'jenkel_mahasiswa',
    //     'tmpt_lahir_mahasiswa',
    //     'tgl_lahir_mahasiswa',
    //     'no_hp_mahasiswa',
    //     'alamat_mahasiswa',
    //     'status_mahasiswa',
    //     'nama_ortua',
    //     'no_hp_ortua',
    // ];
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'mahasiswa_dibuat';
    protected $updatedField  = 'mahasiswa_diubah';
    protected $tahun_akademik  = ['tb_tahun_akademik', 'tb_mahasiswa.id_tahun_akademik = tb_tahun_akademik.id_tahun_akademik', 'LEFT JOIN'];
    protected $akun          = ['users', 'tb_mahasiswa.id_akun = users.id', 'INNER JOIN'];
    protected $prodi         = ['tb_prodi', 'tb_mahasiswa.id_prodi = tb_prodi.id_prodi', 'LEFT JOIN'];

    public function dt()
    {
        $data = DataTables::use($this->table)
            ->join($this->akun[0], $this->akun[1], $this->akun[2])
            ->join($this->tahun_akademik[0], $this->tahun_akademik[1], $this->tahun_akademik[2])
            ->join($this->prodi[0], $this->prodi[1], $this->prodi[2])
            ->make();
        return $data;
    }

    public function prodi()
    {
        $this->join($this->prodi[0], $this->prodi[1], $this->prodi[2]);
        return $this;
    }

    public function tahun_akademik()
    {
        $this->join($this->tahun_akademik[0], $this->tahun_akademik[1], $this->tahun_akademik[2]);
        return $this;
    }

    public function akun()
    {
        $this->join($this->akun[0], $this->akun[1], $this->akun[2]);
        return $this;
    }
}
