<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;
use App\Models\PerusahaanModel;
use App\Models\PraktikIndustriModel;

class PraktikIndustri extends BaseController
{
    public function __construct()
    {
        if (session()->get('peran_akun') != "Administrator") {
            echo 'Access denied';
            exit;
        }
    }

    public function PraktikIndustriView()
    {
        $model = new PraktikIndustriModel();
        if ($this->request->isAJAX()) {
            return $model->getDt();
        }
        return view('_admin/PraktikIndustri/PraktikIndustri');
    }

    public function PraktikIndustriViewDetail()
    {
        $mPraktikIndustri = new PraktikIndustriModel();
        $data['PraktikIndustri'] = $mPraktikIndustri->getDtDetail($this->request->getGet('id'));
        return view('_admin/PraktikIndustri/PraktikIndustriDetail', $data);
    }

    public function PraktikIndustriViewAdd()
    {
        $mPerusahaan    = new PerusahaanModel();
        $mMahasiswa     = new MahasiswaModel();
        $data['Perusahaan'] = $mPerusahaan->getStatus('Aktif');
        $data['Mahasiswa']  = $mMahasiswa->getStatus('Aktif');
        return view('_admin/PraktikIndustri/PraktikIndustriAdd', $data);
    }

    public function PraktikIndustriViewEdit()
    {
        $id = $this->request->getGet('id');
        $mPraktikIndustri = new PraktikIndustriModel();
        $mMahasiswa    = new MahasiswaModel();
        $mPerusahaan   = new PerusahaanModel();
        $data['PraktikIndustri'] = $mPraktikIndustri->find($id);
        $data['Mahasiswa']  = $mMahasiswa->getStatus('Aktif');
        $data['Perusahaan'] = $mPerusahaan->getStatus('Aktif');
        return view('_admin/PraktikIndustri/PraktikIndustriEdit', $data);
    }

    public function PraktikIndustriCreate()
    {
        $mPraktikIndustri = new PraktikIndustriModel();
        $id_mahasiswa = $this->request->getPost('id_mahasiswa');
        $id_perusahaan = $this->request->getPost('id_perusahaan');
        $status_praktik_industri = $this->request->getPost('status_praktik_industri');
        $waktu_awal_praktik_industri = $this->request->getPost('waktu_awal_praktik_industri');
        $waktu_akhir_praktik_industri = $this->request->getPost('waktu_akhir_praktik_industri');

        $valid = $this->validate([
            'id_mahasiswa' => 'required',
            'id_perusahaan' => 'required',
            'status_praktik_industri' => 'required',
            'waktu_awal_praktik_industri' => 'required',
            'waktu_akhir_praktik_industri' => 'required',
        ]);

        if (!$valid) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        try {
            $mPraktikIndustri->save([
                'id_mahasiswa' => $id_mahasiswa,
                'id_perusahaan' => $id_perusahaan,
                'status_praktik_industri' => $status_praktik_industri,
                'waktu_awal_praktik_industri' => $waktu_awal_praktik_industri,
                'waktu_akhir_praktik_industri' => $waktu_akhir_praktik_industri,
            ]);
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
            return redirect()->to('/admin/praktikindustri');
        } catch (\Exception $e) {
            session()->setFlashdata('errors', 'Data gagal ditambahkan');
            return redirect()->back()->withInput();
        }
    }

    public function PraktikIndustriUpdate()
    {
        $mPraktikIndustri = new PraktikIndustriModel();
        $id_praktik_industri = $this->request->getPost('id_praktik_industri');
        $id_mahasiswa = $this->request->getPost('id_mahasiswa');
        $id_perusahaan = $this->request->getPost('id_perusahaan');
        $status_praktik_industri = $this->request->getPost('status_praktik_industri');
        $waktu_awal_praktik_industri = $this->request->getPost('waktu_awal_praktik_industri');
        $waktu_akhir_praktik_industri = $this->request->getPost('waktu_akhir_praktik_industri');
        $konfirmasi = $this->request->getPost('konfirmasi');

        if (!$konfirmasi) {

            $valid = $this->validate([
                'id_praktik_industri' => 'required',
                'id_mahasiswa' => 'required',
                'id_perusahaan' => 'required',
                'status_praktik_industri' => 'required',
                'waktu_awal_praktik_industri' => 'required',
                'waktu_akhir_praktik_industri' => 'required',
            ]);

            if (!$valid) {
                session()->setFlashdata('errors', $this->validator->getErrors());
                return redirect()->back()->withInput();
            }

            try {
                $mPraktikIndustri->update($id_praktik_industri, [
                    'id_mahasiswa' => $id_mahasiswa,
                    'id_perusahaan' => $id_perusahaan,
                    'status_praktik_industri' => $status_praktik_industri,
                    'waktu_awal_praktik_industri' => $waktu_awal_praktik_industri,
                    'waktu_akhir_praktik_industri' => $waktu_akhir_praktik_industri,
                ]);
                session()->setFlashdata('success', 'Data berhasil diubah');
                return redirect()->to('/admin/praktikindustri');
            } catch (\Exception $e) {
                session()->setFlashdata('errors', 'Data gagal diubah');
                return redirect()->back()->withInput();
            }
        } else {
            $update = $mPraktikIndustri->update($id_praktik_industri, [
                'status_praktik_industri' => $status_praktik_industri,
            ]);
            return $update;
        }
    }

    public function PraktikIndustriDelete()
    {
        $id_praktik_industri = $this->request->getPost('id_praktik_industri');
        $mPraktikIndustri = new PraktikIndustriModel();
        $delete = $mPraktikIndustri->delete($id_praktik_industri);
        return $delete;
    }
}
