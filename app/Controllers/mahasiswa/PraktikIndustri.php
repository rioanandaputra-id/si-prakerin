<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\PerusahaanModel;
use App\Models\PraktikIndustriModel;

class PraktikIndustri extends BaseController
{
    public function __construct()
    {
        if (session()->get('peran_akun') != "Mahasiswa") {
            echo 'Access denied';
            exit;
        }
    }

    public function PraktikIndustriView()
    {
        $model  = new PerusahaanModel();
        $id     = $this->request->getGet('id');
        $detail = $this->request->getGet('detail');
        $ajax   = $this->request->isAJAX();

        if ($detail == true) {
            $data = $model->find($id);
            if ($data) {
                return view('_mahasiswa/PraktikIndustri/PraktikIndustriDetail', ['perusahaan' => $data]);
            } else {
                throw new PageNotFoundException('Halaman tidak ditemukan');
            }
        } else {
            if ($ajax) {
                return $model->getDt(true);
            } else {
                return view('_mahasiswa/PraktikIndustri/PraktikIndustri');
            }
        }
    }

    public function PraktikIndustriViewHistory()
    {
        $mPraktikIndustri = new PraktikIndustriModel();
        if ($this->request->isAJAX()) {
            return $mPraktikIndustri->getDt(session()->get('id_pengguna'));
        }
        return view('_mahasiswa/PraktikIndustri/PraktikIndustriHistory');
    }

    public function PraktikIndustriViewHistoryDetail()
    {
        $mPraktikIndustri = new PraktikIndustriModel();
        $data['PraktikIndustri'] = $mPraktikIndustri->getDtDetail($this->request->getGet('id'));
        return view('_mahasiswa/PraktikIndustri/PraktikIndustriHistoryDetail', $data);
    }

    public function PraktikIndustriCreate()
    {
        $mPraktikIndustri = new PraktikIndustriModel();
        $id_mahasiswa = session()->get('id_pengguna');
        $id_perusahaan = $this->request->getPost('id_perusahaan');
        $id_status = 6;

        $checkMhs = $mPraktikIndustri->where('id_mahasiswa', $id_mahasiswa);
        if ($checkMhs->countAllResults() < 1) {
            $mPraktikIndustri->save([
                'id_mahasiswa' => $id_mahasiswa,
                'id_perusahaan' => $id_perusahaan,
                'id_status' => $id_status,
            ]);

            $response = [
                'status' => true,
                'id' => $mPraktikIndustri->insertID ?? null,
                'msg' => 'Praktik Industri berhasil diajukan',
            ];
        } else {
            if ($checkMhs->where('id_status != ', 3)->countAllResults() > 0) {
                $response = [
                    'status' => false,
                    'id' => null,
                    'msg' => 'Anda sudah mengajukan praktik industri',
                ];
            } else {
                $mPraktikIndustri->save([
                    'id_mahasiswa' => $id_mahasiswa,
                    'id_perusahaan' => $id_perusahaan,
                    'id_status' => $id_status,
                ]);

                $response = [
                    'status' => true,
                    'id' => $mPraktikIndustri->insertID ?? null,
                    'msg' => 'Praktik Industri berhasil diajukan kembali',
                ];
            }
        }

        echo json_encode($response);
    }

    public function PraktikIndustriUpdate()
    {
        $mPraktikIndustri = new PraktikIndustriModel();
        $id_praktik_industri = $this->request->getPost('id_praktik_industri');
        $waktu_awal_praktik_industri = $this->request->getPost('waktu_awal_praktik_industri');
        $waktu_akhir_praktik_industri = $this->request->getPost('waktu_akhir_praktik_industri');
        $dokumen_pengajuan_praktik_industri = $this->request->getFile('dokumen_pengajuan_praktik_industri');
        $dokumen_nilai_praktik_industri = $this->request->getFile('dokumen_nilai_praktik_industri');

        $valid = $this->validate([
            'id_praktik_industri' => 'required',
            'waktu_awal_praktik_industri' => 'required',
            'waktu_akhir_praktik_industri' => 'required',
        ]);

        if (!$valid) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        try {
            $mPraktikIndustri->update($id_praktik_industri, [
                'waktu_awal_praktik_industri' => $waktu_awal_praktik_industri,
                'waktu_akhir_praktik_industri' => $waktu_akhir_praktik_industri,
            ]);
            session()->setFlashdata('success', 'Data berhasil diubah');
            return redirect()->to('/mahasiswa/praktikindustri/history/detail?id=' . $id_praktik_industri);
        } catch (\Exception $e) {
            session()->setFlashdata('errors', 'Data gagal diubah');
            return redirect()->back()->withInput();
        }
    }
}
