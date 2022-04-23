<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AkunModel;
use App\Models\DokumenModel;
use App\Models\PegawaiModel;
use App\Models\MahasiswaModel;
use App\Models\PerusahaanModel;
use App\Models\ProdiModel;
use App\Models\TahunAkademikModel;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Authorization\GroupModel;
use CodeIgniter\Exceptions\PageNotFoundException;
// use Myth\Auth\Password;

class DataMaster extends BaseController
{
    public function __construct()
    {
        if (session()->get('peran_akun') != "Administrator") {
            echo 'Access denied';
            exit;
        }
    }
    
    //--------------------------------------------------------------------

    public function PegawaiView()
    {
        $model = new PegawaiModel();
        if ($this->request->isAJAX()) {
            return $model->dt();
        }
        return view('_admin/DataMaster/Pegawai');
    }

    public function MahasiswaView()
    {
        $model = new MahasiswaModel();
        $ajax   = $this->request->isAJAX();
        $status = $this->request->getGet('status');

        if ($ajax) {
            return $model->dt($status);
        }
        return view('_admin/DataMaster/Mahasiswa');
    }

    public function PerusahaanView()
    {
        $model  = new PerusahaanModel();
        $id     = $this->request->getGet('id');
        $detail = $this->request->getGet('detail');
        $status = $this->request->getGet('status');
        $ajax   = $this->request->isAJAX();

        if ($detail == true) {
            $data = $model->find($id);
            if ($data) {
                return view('_admin/DataMaster/PerusahaanDetail', ['perusahaan' => $data]);
            } else {
                throw new PageNotFoundException('Halaman tidak ditemukan');
            }
        } else {
            if ($ajax) {
                if ($status == false) {
                    return $model->getDt(false);
                } else {
                    return $model->getDt(true);
                }
            } else {
                return view('_admin/DataMaster/Perusahaan');
            }
        }
    }

    public function TahunAkademikView()
    {
        $model = new TahunAkademikModel();
        if ($this->request->isAJAX()) {
            return $model->dt();
        }
        return view('_admin/DataMaster/TahunAkademik');
    }

    public function ProdiView()
    {
        $model = new ProdiModel();
        if ($this->request->isAJAX()) {
            return $model->dt();
        }
        return view('_admin/DataMaster/ProgramStudi');
    }

    public function DokumenView()
    {
        $model = new DokumenModel();
        if ($this->request->isAJAX()) {
            return $model->dt();
        }
        return view('_admin/DataMaster/Dokumen');
    }

    //--------------------------------------------------------------------

    public function PegawaiViewAdd()
    {
        return view('_admin/DataMaster/PegawaiAdd');
    }

    public function MahasiswaViewAdd()
    {
        $mTahunAkademik = new TahunAkademikModel();
        $mProdi = new ProdiModel();
        $data['TahunAkademik'] = $mTahunAkademik->findAll();
        $data['Prodi'] = $mProdi->findAll();
        return view('_admin/DataMaster/MahasiswaAdd', $data);
    }

    public function PerusahaanViewAdd()
    {
        return view('_admin/DataMaster/PerusahaanAdd');
    }

    public function TahunAkademikViewAdd()
    {
        return view('_admin/DataMaster/TahunAkademikAdd');
    }

    public function ProdiViewAdd()
    {
        return view('_admin/DataMaster/ProgramStudiAdd');
    }

    public function DokumenViewAdd()
    {
        return view('_admin/DataMaster/DokumenAdd');
    }

    //--------------------------------------------------------------------

    public function PegawaiViewEdit()
    {
        return view('_admin/DataMaster/PegawaiEdit');
    }

    public function MahasiswaViewEdit()
    {
        $id_mahasiswa = $this->request->getGet('id');
        $mTahunAkademik = new TahunAkademikModel();
        $mProdi = new ProdiModel();
        $mMahasiswa = new MahasiswaModel();
        $mAkun = new AkunModel();

        $data['TahunAkademik'] = $mTahunAkademik->findAll();
        $data['Prodi'] = $mProdi->findAll();
        $data['Mahasiswa'] = $mMahasiswa->find($id_mahasiswa);
        $data['Akun'] = $mAkun->find($data['Mahasiswa']['id_akun']);
        return view('_admin/DataMaster/MahasiswaEdit', $data);
    }

    public function PerusahaanViewEdit()
    {
        $model = new PerusahaanModel();
        $id = $this->request->getVar('id');
        if (!$data['perusahaan'] = $model->find($id)) {
            throw PageNotFoundException::forPageNotFound();
        }
        return view('_admin/DataMaster/PerusahaanEdit', $data);
    }

    public function TahunAkademikViewEdit()
    {
        $model = new TahunAkademikModel();
        $id = $this->request->getVar('id');
        if (!$data['tahun_akademik'] = $model->find($id)) {
            throw PageNotFoundException::forPageNotFound();
        }
        return view('_admin/DataMaster/TahunAkademikEdit', $data);
    }

    public function ProdiViewEdit()
    {
        $model = new ProdiModel();
        $id = $this->request->getVar('id');
        if (!$data['prodi'] = $model->find($id)) {
            throw PageNotFoundException::forPageNotFound();
        }
        return view('_admin/DataMaster/ProgramStudiEdit', $data);
    }

    public function DokumenViewEdit()
    {
        return view('_admin/DataMaster/DokumenEdit');
    }

    //--------------------------------------------------------------------

    public function PegawaiCreate()
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

    public function MahasiswaCreate()
    {
        $mMahasiswa = new MahasiswaModel();
        $mAkun = new AkunModel();

        $id_tahun_akademik = $this->request->getPost('id_tahun_akademik');
        $id_prodi = $this->request->getPost('id_prodi');
        $nim_mahasiswa = $this->request->getPost('nim_mahasiswa');
        $nama_mahasiswa = $this->request->getPost('nama_mahasiswa');
        $jenkel_mahasiswa = $this->request->getPost('jenkel_mahasiswa');
        $tmpt_lahir_mahasiswa = $this->request->getPost('tmpt_lahir_mahasiswa');
        $tgl_lahir_mahasiswa = $this->request->getPost('tgl_lahir_mahasiswa');
        $no_hp_mahasiswa = $this->request->getPost('no_hp_mahasiswa');
        $alamat_mahasiswa = $this->request->getPost('alamat_mahasiswa');
        $nama_ortua = $this->request->getPost('nama_ortua');
        $no_hp_ortua = $this->request->getPost('no_hp_ortua');
        $email_mahasiswa = $this->request->getPost('email_mahasiswa');

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $status_akun = $this->request->getPost('status_akun');

        $valid = $this->validate([
            'id_tahun_akademik' => 'required',
            'id_prodi' => 'required',
            'nim_mahasiswa' => 'required|is_unique[tb_mahasiswa.nim_mahasiswa]',
            'nama_mahasiswa' => 'required',
            'email_mahasiswa' => 'is_unique[tb_mahasiswa.email_mahasiswa]',
            'username' => 'is_unique[tb_akun.username]',
            'password' => 'required|min_length[8]',
            'status_akun' => 'required',
        ]);

        if (!$valid) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        try {
            $mAkun->save([
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'peran_akun' => 'Mahasiswa',
                'status_akun' => $status_akun,
            ]);

            $mMahasiswa->save([
                'id_akun' =>  $mAkun->getInsertID(),
                'id_tahun_akademik' => $id_tahun_akademik,
                'id_prodi' => $id_prodi,
                'nim_mahasiswa' => $nim_mahasiswa,
                'nama_mahasiswa' => $nama_mahasiswa,
                'jenkel_mahasiswa' => $jenkel_mahasiswa,
                'tmpt_lahir_mahasiswa' => $tmpt_lahir_mahasiswa,
                'tgl_lahir_mahasiswa' => $tgl_lahir_mahasiswa,
                'email_mahasiswa' => $email_mahasiswa,
                'no_hp_mahasiswa' => $no_hp_mahasiswa,
                'alamat_mahasiswa' => $alamat_mahasiswa,
                'nama_ortua' => $nama_ortua,
                'no_hp_ortua' => $no_hp_ortua,
            ]);
            session()->setFlashdata('success', 'Data mahasiswa berhasil ditambahkan');
            return redirect()->to('/admin/datamaster/mahasiswa/add');
        } catch (\Throwable $th) {
            session()->setFlashdata('errors', 'Data mahasiswa gagal ditambahkan');
            return redirect()->back()->withInput();
        }
    }

    public function PerusahaanCreate()
    {
        $model = new PerusahaanModel();
        $nama_perusahaan = $this->request->getPost('nama_perusahaan');
        $alamat_perusahaan = $this->request->getPost('alamat_perusahaan');
        $telp_perusahaan = $this->request->getPost('telp_perusahaan');
        $email_perusahaan = $this->request->getPost('email_perusahaan');
        $web_perusahaan = $this->request->getPost('web_perusahaan');
        $long_perusahaan = $this->request->getPost('long_perusahaan');
        $lat_perusahaan = $this->request->getPost('lat_perusahaan');
        $status_perusahaan = (in_groups('Admin')) ? 'Pengajuan Diterima' : 'Pengajuan Baru';

        $input = $this->validate([
            'nama_perusahaan' => 'required|min_length[3]|max_length[150]',
            'alamat_perusahaan' => 'required|min_length[3]|max_length[225]',
            'telp_perusahaan' => 'required|min_length[8]|max_length[20]',
        ]);

        if (!$input) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        $create = $model->save([
            'nama_perusahaan' => $nama_perusahaan,
            'alamat_perusahaan' => $alamat_perusahaan,
            'telp_perusahaan' => $telp_perusahaan,
            'email_perusahaan' => $email_perusahaan,
            'web_perusahaan' => $web_perusahaan,
            'long_perusahaan' => $long_perusahaan,
            'lat_perusahaan' => $lat_perusahaan,
            'status_perusahaan' => $status_perusahaan,
        ]);

        if (!$create) {
            session()->setFlashdata('errors', 'Data perusahaan gagal ditambahkan');
            return redirect()->back()->withInput();
        } else {
            session()->setFlashdata('success', 'Data perusahaan berhasil ditambahkan');
            return redirect()->to('/admin/datamaster/perusahaan/add');
        }
    }

    public function TahunAkademikCreate()
    {
        $model = new TahunAkademikModel();
        $tahun_akademik = $this->request->getPost('tahun_akademik');
        $status_tahun_akademik = $this->request->getPost('status_tahun_akademik');

        $input = $this->validate([
            'tahun_akademik' => 'required|min_length[4]|max_length[10]',
            'status_tahun_akademik' => 'required',
        ]);

        if (!$input) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        $create = $model->save([
            'tahun_akademik' => $tahun_akademik,
            'status_tahun_akademik' => $status_tahun_akademik,
        ]);

        if (!$create) {
            session()->setFlashdata('errors', 'Data tahun akademik gagal ditambahkan');
            return redirect()->back()->withInput();
        } else {
            session()->setFlashdata('success', 'Data tahun akademik berhasil ditambahkan');
            return redirect()->to('/admin/datamaster/tahunakademik/add');
        }
    }

    public function ProdiCreate()
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

    public function DokumenCreate()
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

    public function PegawaiUpdate()
    {
        //
    }

    public function MahasiswaUpdate()
    {
        $mMahasiswa = new MahasiswaModel();
        $mAkun = new AkunModel();

        $id_mahasiswa = $this->request->getPost('id_mahasiswa');
        $id_tahun_akademik = $this->request->getPost('id_tahun_akademik');
        $id_prodi = $this->request->getPost('id_prodi');
        $nim_mahasiswa = $this->request->getPost('nim_mahasiswa');
        $nama_mahasiswa = $this->request->getPost('nama_mahasiswa');
        $jenkel_mahasiswa = $this->request->getPost('jenkel_mahasiswa');
        $tmpt_lahir_mahasiswa = $this->request->getPost('tmpt_lahir_mahasiswa');
        $tgl_lahir_mahasiswa = $this->request->getPost('tgl_lahir_mahasiswa');
        $no_hp_mahasiswa = $this->request->getPost('no_hp_mahasiswa');
        $alamat_mahasiswa = $this->request->getPost('alamat_mahasiswa');
        $nama_ortua = $this->request->getPost('nama_ortua');
        $no_hp_ortua = $this->request->getPost('no_hp_ortua');

        $id_akun = $mMahasiswa->select('id_akun')->where('id_mahasiswa', $id_mahasiswa)->first();
        $email_mahasiswa = $this->request->getPost('email_mahasiswa');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $status_akun = $this->request->getPost('status_akun');

        $valid = $this->validate([
            'id_tahun_akademik' => 'required',
            'id_prodi' => 'required',
            'nim_mahasiswa' => 'required|is_unique[tb_mahasiswa.nim_mahasiswa, id_mahasiswa, ' . $id_mahasiswa . ']',
            'nama_mahasiswa' => 'required',
            'email_mahasiswa' => 'is_unique[tb_mahasiswa.email_mahasiswa, id_mahasiswa, ' . $id_mahasiswa . ']',
            'username' => 'is_unique[tb_akun.username, id_akun, ' . $id_akun["id_akun"] . ']',
            'status_akun' => 'required',
        ]);

        if (!$valid) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        try {
            $mMahasiswa->update($id_mahasiswa, [
                'id_tahun_akademik' => $id_tahun_akademik,
                'id_prodi' => $id_prodi,
                'nim_mahasiswa' => $nim_mahasiswa,
                'nama_mahasiswa' => $nama_mahasiswa,
                'jenkel_mahasiswa' => $jenkel_mahasiswa,
                'tmpt_lahir_mahasiswa' => $tmpt_lahir_mahasiswa,
                'tgl_lahir_mahasiswa' => $tgl_lahir_mahasiswa,
                'email_mahasiswa' => $email_mahasiswa,
                'no_hp_mahasiswa' => $no_hp_mahasiswa,
                'alamat_mahasiswa' => $alamat_mahasiswa,
                'nama_ortua' => $nama_ortua,
                'no_hp_ortua' => $no_hp_ortua,
            ]);

            if (!empty($password)) {
                $mAkun->update($id_akun["id_akun"], [
                    'username' => $username,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'status_akun' => $status_akun,
                ]);
            } else {
                $mAkun->update($id_akun["id_akun"], [
                    'username' => $username,
                    'status_akun' => $status_akun,
                ]);
            }

            session()->setFlashdata('success', 'Data mahasiswa berhasil diperbarui');
            return redirect()->to('/admin/datamaster/mahasiswa/edit/?id=' . $id_mahasiswa);
        } catch (\Exception $e) {
            session()->setFlashdata('errors', 'Data mahasiswa gagal diperbarui');
            return redirect()->back()->withInput();
        }
    }

    public function PerusahaanUpdate()
    {
        $model = new PerusahaanModel();
        $id_perusahaan = $this->request->getPost('id_perusahaan');
        $konfirmasi = $this->request->getPost('konfirmasi');
        $nama_perusahaan = $this->request->getPost('nama_perusahaan');
        $alamat_perusahaan = $this->request->getPost('alamat_perusahaan');
        $telp_perusahaan = $this->request->getPost('telp_perusahaan');
        $email_perusahaan = $this->request->getPost('email_perusahaan');
        $web_perusahaan = $this->request->getPost('web_perusahaan');
        $long_perusahaan = $this->request->getPost('long_perusahaan');
        $lat_perusahaan = $this->request->getPost('lat_perusahaan');
        $status_perusahaan = $this->request->getPost('status_perusahaan');

        if (!$konfirmasi) {

            $input = $this->validate([
                'nama_perusahaan' => 'required|min_length[5]|max_length[150]',
                'alamat_perusahaan' => 'required|min_length[5]|max_length[225]',
                'telp_perusahaan' => 'required|min_length[8]|max_length[20]',
            ]);

            if (!$input) {
                session()->setFlashdata('errors', $this->validator->getErrors());
                return redirect()->back()->withInput();
            }

            $update = $model->update($id_perusahaan, [
                'nama_perusahaan' => $nama_perusahaan,
                'alamat_perusahaan' => $alamat_perusahaan,
                'telp_perusahaan' => $telp_perusahaan,
                'email_perusahaan' => $email_perusahaan,
                'web_perusahaan' => $web_perusahaan,
                'long_perusahaan' => $long_perusahaan,
                'lat_perusahaan' => $lat_perusahaan,
                'status_perusahaan' => (in_groups('Admin')) ? 'Pengajuan Diterima' : 'Pengajuan Baru',
            ]);

            if ($update) {
                session()->setFlashdata('success', 'Data perusahaan berhasil diubah');
                return redirect()->to('admin/datamaster/perusahaan/edit/?id=' . $id_perusahaan);
            } else {
                session()->setFlashdata('errors', 'Data perusahaan gagal diubah');
                return redirect()->back()->withInput();
            }
        } else {

            $update = $model->update($id_perusahaan, [
                'status_perusahaan' => $status_perusahaan,
            ]);
            return $update;
        }
    }

    public function TahunAkademikUpdate()
    {
        $model = new TahunAkademikModel();
        $id_tahun_akademik = $this->request->getVar('id_tahun_akademik');
        $konfirmasi = $this->request->getPost('konfirmasi');
        $tahun_akademik = $this->request->getPost('tahun_akademik');
        $status_tahun_akademik = $this->request->getPost('status_tahun_akademik');

        if (!$konfirmasi) {

            $input = $this->validate([
                'tahun_akademik' => 'required|min_length[4]|max_length[10]',
                'status_tahun_akademik' => 'required',
            ]);

            if (!$input) {
                session()->setFlashdata('errors', $this->validator->getErrors());
                return redirect()->back()->withInput();
            }

            $update = $model->update($id_tahun_akademik, [
                'tahun_akademik' => $tahun_akademik,
                'status_tahun_akademik' => $status_tahun_akademik,
            ]);

            if ($update) {
                session()->setFlashdata('success', 'Data tahun akademik berhasil diubah');
                return redirect()->to('admin/datamaster/tahunakademik/edit/?id=' . $id_tahun_akademik);
            } else {
                session()->setFlashdata('errors', 'Data tahun akademik gagal diubah');
                return redirect()->back()->withInput();
            }
        } else {

            $update = $model->update($id_tahun_akademik, [
                'status_tahun_akademik' => $status_tahun_akademik,
            ]);
            return $update;
        }
    }

    public function ProdiUpdate()
    {
        $model = new ProdiModel();
        $id_prodi = $this->request->getVar('id_prodi');
        $konfirmasi = $this->request->getPost('konfirmasi');
        $nama_prodi = $this->request->getPost('nama_prodi');
        $nama_alias = $this->request->getPost('nama_alias');
        $status_prodi = $this->request->getPost('status_prodi');

        if (!$konfirmasi) {

            $input = $this->validate([
                'nama_prodi' => 'required|min_length[5]|max_length[150]',
                'nama_alias' => 'required|min_length[5]|max_length[150]',
                'status_prodi' => 'required',
            ]);

            if (!$input) {
                session()->setFlashdata('errors', $this->validator->getErrors());
                return redirect()->back()->withInput();
            }

            $update = $model->update($id_prodi, [
                'nama_prodi' => $nama_prodi,
                'nama_alias' => $nama_alias,
                'status_prodi' => $status_prodi,
            ]);

            if ($update) {
                session()->setFlashdata('success', 'Data prodi berhasil diubah');
                return redirect()->to('admin/datamaster/prodi/edit/?id=' . $id_prodi);
            } else {
                session()->setFlashdata('errors', 'Data prodi gagal diubah');
                return redirect()->back()->withInput();
            }
        } else {

            $update = $model->update($id_prodi, [
                'status_prodi' => $status_prodi,
            ]);
            return $update;
        }
    }

    public function DokumenUpdate()
    {
        // $model = new DokumenModel();
        // $id_dokumen = $this->request->getPost('id_dokumen');
        // $judul_dokumen = $this->request->getPost('judul_dokumen');
        // $format_dokumen = $this->request->getPost('format_dokumen');
        // $ukuran_dokumen = $this->request->getPost('ukuran_dokumen');
        // $path_dokumen = $this->request->getPost('path_dokumen');
        // $upload_dokumen = $this->request->getPost('upload_dokumen');
        // $status_dokumen = $this->request->getPost('status_dokumen');

        // $input = $this->validate([
        //     'judul_dokumen' => 'required|min_length[4]|max_length[50]',
        //     'format_dokumen' => 'required|min_length[4]|max_length[10]',
        //     'ukuran_dokumen' => 'required|min_length[4]|max_length[10]',
        //     'status_dokumen' => 'required',
        // ]);

    }

    //--------------------------------------------------------------------

    public function PegawaiDelete()
    {
        $model = new PegawaiModel();
        $id_pegawai = $this->request->getPost('id_pegawai');
        $delete = $model->delete($id_pegawai);
        return $delete;
    }

    public function MahasiswaDelete()
    {
        $model = new MahasiswaModel();
        $id_mahasiswa = $this->request->getPost('id_mahasiswa');
        $delete = $model->delete($id_mahasiswa);
        return $delete;
    }

    public function PerusahaanDelete()
    {
        $model = new PerusahaanModel();
        $id_perusahaan = $this->request->getPost('id_perusahaan');
        $delete = $model->delete($id_perusahaan);
        return $delete;
    }

    public function TahunAkademikDelete()
    {
        $model = new TahunAkademikModel();
        $id_tahun_akademik = $this->request->getPost('id_tahun_akademik');
        $delete = $model->delete($id_tahun_akademik);
        return $delete;
    }

    public function ProdiDelete()
    {
        $model = new ProdiModel();
        $id_prodi = $this->request->getPost('id_prodi');
        $delete = $model->delete($id_prodi);
        return $delete;
    }

    public function DokumenDelete()
    {
        $model = new DokumenModel();
        $id_dokumen = $this->request->getPost('id_dokumen');
        $delete = $model->delete($id_dokumen);
        return $delete;
    }
}
