<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;
use App\Models\BimbinganJudulModel;
use App\Models\BimbinganJudulRiwayatModel;
use App\Models\BimbinganModel;
use App\Models\PraktikIndustriModel;

class Bimbingan extends BaseController
{
    public function BimbinganView()
    {
        $mBimbinganJudul = new BimbinganJudulModel();
        $mPraktikIndustri = new PraktikIndustriModel();
        $mBimbingan = new BimbinganModel();

        $data['syarat']  = $mPraktikIndustri->getStatusCount(session()->get('id_pengguna'), 'Penilaian praktik industri disetujui');
        $data['dosbing'] = $mBimbingan->getDetail(session()->get('id_pengguna'));

        $ajax = $this->request->isAJAX();
        if ($ajax) {
            return $mBimbinganJudul->getDt(session()->get('id_pengguna'));
        } else {
            return view('_mahasiswa/Bimbingan/Bimbingan', $data);
        }
    }

    public function BimbinganViewAdd()
    {
        return view('_mahasiswa/Bimbingan/BimbinganAdd');
    }

    public function BimbinganViewDetail()
    {
        $mBimbinganJudul = new BimbinganJudulModel();
        $mBimbinganJudulRiwayat = new BimbinganJudulRiwayatModel();
        $mBimbingan = new BimbinganModel();
        $mPraktikIndustri = new PraktikIndustriModel();

        $data['judul'] = $mBimbinganJudul->find($this->request->getPost('id'));
        $data['riwayat'] = $mBimbinganJudulRiwayat->where('id_bimbingan_judul', $this->request->getPost('id'))->orderBy('id_bimbingan_judul_riwayat', 'DESC')->get();

        return view('_mahasiswa/Bimbingan/BimbinganDetail', $data);
    }

    public function BimbinganCreate()
    {
        $mBimbingan = new BimbinganModel();
        $mBimbinganJudul = new BimbinganJudulModel();
        $mPraktikIndustri = new PraktikIndustriModel();

        $valid = $this->validate([
            'judul_diajukan' => 'required',
        ]);

        if (!$valid) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        $id_mahasiswa = session()->get('id_pengguna');
        $syarat  = $mPraktikIndustri->getStatusCount(session()->get('id_pengguna'), 'Penilaian praktik industri disetujui');
        $id_bimbingan = $mBimbingan->getDetail($id_mahasiswa);

        if (empty($id_bimbingan) || $syarat == 0) {
            session()->setFlashdata('error', 'Anda belum memenuhi syarat untuk melakukan bimbingan!');
            return redirect()->to('/mahasiswa/bimbingan');
        }

        $id_bimbingan = $id_bimbingan[0]['id_bimbingan'];
        $judul_diajukan = $this->request->getPost('judul_diajukan');
        $tanggal_diajukan = date('Y-m-d H:i:s');
        $satatus_bimbingan = 'Diajukan';

        $mBimbinganJudul->save([
            'judul_diajukan' => $judul_diajukan,
            'tanggal_diajukan' => $tanggal_diajukan,
            'status_bimbingan' => $satatus_bimbingan,
            'id_bimbingan' => $id_bimbingan,
        ]);

        session()->setFlashdata('success', 'Berhasil menambahkan judul!');
        return redirect()->to('/mahasiswa/bimbingan');
    }
}
