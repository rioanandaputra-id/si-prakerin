<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\DokumenModel;
use App\Models\PegawaiModel;
use App\Models\MahasiswaModel;
use App\Models\PerusahaanModel;
use App\Models\ProgramStudiModel;
use App\Models\TahunAkademikModel;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Authorization\GroupModel;

class DataMaster extends BaseController
{

    //--------------------------------------------------------------------

    public function view_pegawai()
    {
        $model = new PegawaiModel();
        if ($this->request->isAJAX()) {
            return $model->dt();
        }
        return view('_admin/DataMaster/Pegawai');
    }

    public function view_mahasiswa()
    {
        $model = new MahasiswaModel();
        if ($this->request->isAJAX()) {
            return $model->dt();
        }
        return view('_admin/DataMaster/Mahasiswa');
    }

    public function view_perusahaan()
    {
        $model = new PerusahaanModel();
        if ($this->request->isAJAX()) {
            if ($this->request->getGet('status') == 0) {
                return $model->dt(0);
            } else {
                return $model->dt(1);
            }
        }
        return view('_admin/DataMaster/Perusahaan');
    }

    public function view_tahun_akademik()
    {
        $model = new TahunAkademikModel();
        if ($this->request->isAJAX()) {
            return $model->dt();
        }
        return view('_admin/DataMaster/TahunAkademik');
    }

    public function view_prodi()
    {
        $model = new ProgramStudiModel();
        if ($this->request->isAJAX()) {
            return $model->dt();
        }
        return view('_admin/DataMaster/ProgramStudi');
    }

    public function view_dokumen()
    {
        $model = new DokumenModel();
        if ($this->request->isAJAX()) {
            return $model->dt();
        }
        return view('_admin/DataMaster/Dokumen');
    }

    //--------------------------------------------------------------------

    public function view_add_admin()
    {
        return view('_admin/DataMaster/AdminAdd');
    }

    public function view_add_pegawai()
    {
        return view('_admin/DataMaster/PegawaiAdd');
    }

    public function view_add_mahasiswa()
    {
        return view('_admin/DataMaster/MahasiswaAdd');
    }

    public function view_add_perusahaan()
    {
        return view('_admin/DataMaster/PerusahaanAdd');
    }

    public function view_add_tahun_akademik()
    {
        return view('_admin/DataMaster/TahunAkademikAdd');
    }

    public function view_add_prodi()
    {
        return view('_admin/DataMaster/ProgramStudiAdd');
    }

    public function view_add_dokumen()
    {
        return view('_admin/DataMaster/DokumenAdd');
    }

    //--------------------------------------------------------------------

    public function view_edit_admin()
    {
        return view('_admin/DataMaster/AdminEdit');
    }

    public function view_edit_pegawai()
    {
        return view('_admin/DataMaster/PegawaiEdit');
    }

    public function view_edit_mahasiswa()
    {
        return view('_admin/DataMaster/MahasiswaEdit');
    }

    public function view_edit_perusahaan()
    {
        return view('_admin/DataMaster/PerusahaanEdit');
    }

    public function view_edit_tahun_akademik()
    {
        return view('_admin/DataMaster/TahunAkademikEdit');
    }

    public function view_edit_prodi()
    {
        return view('_admin/DataMaster/ProgramStudiEdit');
    }

    public function view_edit_dokumen()
    {
        return view('_admin/DataMaster/DokumenEdit');
    }

    //--------------------------------------------------------------------

    public function create_admin()
    {
        //
    }

    public function create_pegawai()
    {
        $input_pegawai = $this->validate([
            'id_prodi' => 'required|number|max_length[11]',
            'nip_pegawai' => 'required|number|max_length[20]|is_unique[tb_pegawai.nip_pegawai]',
            'nama_pegawai' => 'required|max_length[150]',
            'jenkel_pegawai' => 'required|enum[Laki-Laki,Perempuan]',
            'tmpt_lahir_pegawai' => 'required|max_length[150]',
            'tgl_lahir_pegawai' => 'required|date',
            'no_hp_pegawai' => 'required|number|max_length[20]',
            'alamat_pegawai' => 'required|max_length[225]',
        ]);

        $input_akun = $this->validate([
            'email' => 'required|valid_email|is_unique[users.email]',
            'username' => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
            'password' => 'required|min_length[8]|max_length[20]',
        ]);

        if (!$input_pegawai) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        if (!$input_akun) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        $model_pegawai = new PegawaiModel();
        $model_akun = new UserModel();
        $model_group = new GroupModel();

        try {
            $model_akun->save([
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ]);

            $model_group->save([
                'id_group' => 1,
                'id_user' => $model_akun->getLastID(),
            ]);

            $model_pegawai->save([
                'id_akun' => $model_akun->getLastID(),
                'id_prodi' => $this->request->getPost('id_prodi'),
                'nip_pegawai' => $this->request->getPost('nip_pegawai'),
                'nama_pegawai' => $this->request->getPost('nama_pegawai'),
                'jenkel_pegawai' => $this->request->getPost('jenkel_pegawai'),
                'tmpt_lahir_pegawai' => $this->request->getPost('tmpt_lahir_pegawai'),
                'tgl_lahir_pegawai' => $this->request->getPost('tgl_lahir_pegawai'),
                'no_hp_pegawai' => $this->request->getPost('no_hp_pegawai'),
                'alamat_pegawai' => $this->request->getPost('alamat_pegawai'),
                'status_pegawai' => (in_groups('Admin')) ? 'Diterima' : 'Baru',
                'pegawai_dibuat' => date('Y-m-d H:i:s'),
                'id_pembuat_pegawai' => user_id(),
            ]);

            session()->setFlashdata('success', 'Data berhasil ditambahkan');
            return redirect()->to('/admin/datamaster/pegawai');
        } catch (\Exception $e) {
            session()->setFlashdata('errors', 'Data gagal ditambahkan');
            return redirect()->back()->withInput();
        }
    }

    public function create_mahasiswa()
    {
        $input_mahasiswa = $this->validate([
            'nim_mahasiswa' => 'required|min_length[10]|max_length[10]|is_unique[tb_mahasiswa.nim_mahasiswa]',
            'nama_mahasiswa' => 'required|min_length[3]|max_length[50]',
            'jenkel_mahasiswa' => 'required',
            'tmpt_lahir_mahasiswa' => 'required',
            'tgl_lahir_mahasiswa' => 'required',
            'no_hp_mahasiswa' => 'required',
            'alamat_mahasiswa' => 'required|valid_email',
            'nama_ortua' => 'required',
            'no_hp_ortua' => 'required',
        ]);

        $input_akun = $this->validate([
            'email' => 'required|valid_email|is_unique[users.email]',
            'username' => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
            'password' => 'required|min_length[8]|max_length[20]',
        ]);

        if (!$input_mahasiswa) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        if (!$input_akun) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        $model_mahasiswa = new MahasiswaModel();
        $model_akun      = new UserModel();
        $model_group     = new GroupModel();

        try {
            $model_akun->save([
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ]);

            $model_group->save([
                'id_group' => 2,
                'id_user' => $model_akun->getLastID(),
            ]);

            $model_mahasiswa->save([
                'id_akun' => $model_akun->getLastID(),
                'nim_mahasiswa' => $this->request->getPost('nim_mahasiswa'),
                'nama_mahasiswa' => $this->request->getPost('nama_mahasiswa'),
                'jenkel_mahasiswa' => $this->request->getPost('jenkel_mahasiswa'),
                'tmpt_lahir_mahasiswa' => $this->request->getPost('tmpt_lahir_mahasiswa'),
                'tgl_lahir_mahasiswa' => $this->request->getPost('tgl_lahir_mahasiswa'),
                'no_hp_mahasiswa' => $this->request->getPost('no_hp_mahasiswa'),
                'alamat_mahasiswa' => $this->request->getPost('alamat_mahasiswa'),
                'nama_ortua' => $this->request->getPost('nama_ortua'),
                'no_hp_ortua' => $this->request->getPost('no_hp_ortua'),
            ]);

            session()->setFlashdata('success', 'Data mahasiswa berhasil ditambahkan');
            return redirect()->to('/admin/datamaster/mahasiswa/add');
        } catch (\Exception $e) {
            session()->setFlashdata('errors', 'Data mahasiswa gagal ditambahkan');
            return redirect()->back()->withInput();
        }
    }

    public function create_perusahaan()
    {
        $input = $this->validate([
            'nama_perusahaan' => 'required|min_length[3]|max_length[150]',
            'alamat_perusahaan' => 'required|min_length[3]|max_length[225]',
            'telp_perusahaan' => 'required|min_length[8]|max_length[20]',
        ]);

        if (!$input) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        $model = new PerusahaanModel();

        try {
            $model->save([
                'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
                'alamat_perusahaan' => $this->request->getPost('alamat_perusahaan'),
                'telp_perusahaan' => $this->request->getPost('telp_perusahaan'),
                'email_perusahaan' => $this->request->getPost('email_perusahaan'),
                'web_perusahaan' => $this->request->getPost('web_perusahaan'),
                'long_perusahaan' => $this->request->getPost('long_perusahaan'),
                'lat_perusahaan' => $this->request->getPost('lat_perusahaan'),
                'status_perusahaan' => (in_groups('Admin')) ? 'Diterima' : 'Baru',
                'perusahaan_dibuat' => date('Y-m-d H:i:s'),
                'id_pembuat_perusahaan' => user_id(),
            ]);

            session()->setFlashdata('success', 'Data perusahaan berhasil ditambahkan');
            return redirect()->to('/admin/datamaster/perusahaan');
        } catch (\Exception $e) {
            session()->setFlashdata('errors', 'Data perusahaan gagal ditambahkan');
            return redirect()->back()->withInput();
        }
    }

    public function create_tahun_akademik()
    {
        $input = $this->validate([
            'tahun_akademik' => 'required|min_length[4]|max_length[10]',
        ]);

        if (!$input) {
            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $model = new TahunAkademikModel();

        try {
            $model->save([
                'tahun_akademik' => $this->request->getPost('tahun_akademik'),
                'tahun_akademik_dibuat' => date('Y-m-d H:i:s'),
                'id_pembuat_tahun_akademik' => user_id(),
            ]);

            session()->setFlashdata('success', 'Data tahun akademik berhasil ditambahkan');
            return redirect()->to('/admin/datamaster/tahunakademik');
        } catch (\Exception $e) {
            session()->setFlashdata('errors', 'Data tahun akademik gagal ditambahkan');
            return redirect()->back()->withInput();
        }
    }

    public function create_prodi()
    {
        $input = $this->validate([
            'nama_prodi' => 'required|min_length[4]|max_length[10]',
            'nama_alias' => 'required|min_length[4]|max_length[10]',
        ]);

        if (!$input) {
            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $model = new TahunAkademikModel();

        try {
            $model->save([
                'nama_prodi' => $this->request->getPost('nama_prodi'),
                'nama_alias' => $this->request->getPost('nama_alias'),
                'prodi_dibuat' => date('Y-m-d H:i:s'),
                'id_pembuat_prodi' => user_id(),
            ]);

            session()->setFlashdata('success', 'Data prodi berhasil ditambahkan');
            return redirect()->to('/admin/datamaster/prodi');
        } catch (\Exception $e) {
            session()->setFlashdata('errors', 'Data prodi gagal ditambahkan');
            return redirect()->back()->withInput();
        }
    }

    public function create_dokumen()
    {
        $this->load->helper('slug_helper');
        $input = $this->validate([
            'judul_dokumen' => 'required|min_length[4]|max_length[10]',
        ]);

        if (!$input) {
            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $file = $this->request->getFile('file_dokumen');
        $judul = $this->request->getVar('judul_dokumen');
        $path = './uploads/dokumen/';
        $slug = slug($judul);
        $model = new DokumenModel();

        try {
            if (!empty($file)) {
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }

                if (!$file->move($path, $slug)) {
                    session()->setFlashdata('errors', 'Gagal unggah file.');
                    return redirect()->back()->withInput();
                }

                $model->save([
                    'judul_dokumen' => $judul,
                    'format_dokumen' => $file->getExtension(),
                    'ukuran_dokumen' => $file->getSize(),
                    'path_dokumen' => $file->getExtension(),
                    'upload_dokumen' => 1,
                    'status_dokumen' => 'Terbit',
                    'dokumen_dibuat' => date('Y-m-d H:i:s'),
                    'id_pembuat_dokumen' => user_id(),
                ]);
            }

            session()->setFlashdata('success', 'Data dokumen berhasil ditambahkan');
            return redirect()->to('/admin/datamaster/dokumen');
        } catch (\Exception $e) {
            session()->setFlashdata('errors', 'Data dokumen gagal ditambahkan');
            return redirect()->back()->withInput();
        }
    }

    //--------------------------------------------------------------------

    public function update_admin()
    {
        //
    }

    public function update_pegawai()
    {
        //
    }

    public function update_mahasiswa()
    {
        //
    }

    public function update_perusahaan()
    {
        $model_perusahaan = new PerusahaanModel();
        
        if ($this->request->getPost('konfirmasi') == 1) {
            $model_perusahaan->update($this->request->getPost('checkbox_item'), [
                'status_perusahaan' => $this->request->getPost('status'),
            ]);

        } else {
            $input_perusahaan = $this->validate([
                'nama_perusahaan' => 'required|min_length[4]|max_length[10]',
                'alamat_perusahaan' => 'required|min_length[4]|max_length[10]',
                'telp_perusahaan' => 'required|min_length[8]|max_length[20]',
            ]);

            if (!$input_perusahaan) {
                session()->setFlashdata('errors', $this->validator->getErrors());
                return redirect()->back()->withInput();
            }

            try {
                $model_perusahaan->update($this->request->getPost('id_perusahaan'), [
                    'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
                    'alamat_perusahaan' => $this->request->getPost('alamat_perusahaan'),
                    'telp_perusahaan' => $this->request->getPost('telp_perusahaan'),
                    'email_perusahaan' => $this->request->getPost('email_perusahaan'),
                    'web_perusahaan' => $this->request->getPost('web_perusahaan'),
                    'long_perusahaan' => $this->request->getPost('long_perusahaan'),
                    'lat_perusahaan' => $this->request->getPost('lat_perusahaan'),
                    'status_perusahaan' => $this->request->getPost('status_perusahaan'),
                    'perusahaan_diubah' => date('Y-m-d H:i:s'),
                    'id_pengubah_perusahaan' => user_id(),
                ]);

                session()->setFlashdata('success', 'Data Perusahaan berhasil diubah');
                return redirect()->to('admin/datamaster/perusahaan/edit/' . $this->request->getPost('id_perusahaan'));
            } catch (\Exception $e) {
                session()->setFlashdata('errors', 'Data Perusahaan gagal diubah');
                return redirect()->back()->withInput();
            }
        }
    }

    public function update_tahun_akademik()
    {
        //
    }

    public function update_prodi()
    {
        //
    }

    public function update_dokumen()
    {
        //
    }

    //--------------------------------------------------------------------

    public function delete_admin()
    {
        //
    }

    public function delete_pegawai()
    {
        $id_pegawai = $this->request->getPost('checkbox_item');
        $model_pegawai = new PegawaiModel();
        $model_pegawai->whereIn('id_pegawai', $id_pegawai)->delete();
    }

    public function delete_mahasiswa()
    {
        $id_mahasiswa = $this->request->getPost('checkbox_item');
        $model_mahasiswa = new MahasiswaModel();
        $model_mahasiswa->whereIn('id_mahasiswa', $id_mahasiswa);

        print_r($model_mahasiswa->get());
    }

    public function delete_perusahaan()
    {
        $id_perusahaan = $this->request->getPost('checkbox_item');
        $model_perusahaan = new PerusahaanModel();
        $model_perusahaan->whereIn('id_perusahaan', $id_perusahaan)->delete();
    }

    public function delete_tahun_akademik()
    {
        $id_tahun_akademik = $this->request->getPost('checkbox_item');
        $model_tahun_akademik = new TahunAkademikModel();
        $model_tahun_akademik->whereIn('id_tahun_akademik', $id_tahun_akademik)->delete();
    }

    public function delete_prodi()
    {
        $id_prodi = $this->request->getPost('checkbox_item');
        $model_prodi = new ProgramStudiModel();
        $model_prodi->whereIn('id_prodi', $id_prodi)->delete();
    }

    public function delete_dokumen()
    {
        $id_dokumen = $this->request->getPost('checkbox_item');
        $model_dokumen = new DokumenModel();
        $model_dokumen->whereIn('id_dokumen', $id_dokumen)->delete();
    }
}
