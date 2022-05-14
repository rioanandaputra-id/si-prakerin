<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;
use App\Models\DokumenModel;
use App\Models\MahasiswaModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\PerusahaanModel;
use App\Models\PraktikIndustriModel;
use App\Models\PraktikIndustriNilaiModel;

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
            $data = $model->getId($id);
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

    public function PraktikIndustriViewAdd()
    {
        return view('_mahasiswa/PraktikIndustri/PraktikIndustriAdd');
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
        $mPi    = new PraktikIndustriModel();
        $mPiNil = new PraktikIndustriNilaiModel();
        $mDok   = new DokumenModel();

        $data['Pi'] = $mPi->getDtDetail($this->request->getGet('id'));
        if (!empty($data['Pi']['id_dokumen'])) {
            $data['DokPi'] = $mDok->where('id_dokumen', $data['Pi']['id_dokumen'])->first();
        }

        $data['PiNil'] = $mPiNil->where('id_praktik_industri', $this->request->getGet('id'))->first();
        if (!empty($data['PiNil']['id_dokumen'])) {
            $data['DokPiNil'] = $mDok->where('id_dokumen', $data['PiNil']['id_dokumen'])->first();
        }

        return view('_mahasiswa/PraktikIndustri/PraktikIndustriHistoryDetail', $data);
    }

    public function PraktikIndustriCreate()
    {
        $selected = $this->request->getPost('selected');

        if ($selected == true) {

            $mPraktikIndustri = new PraktikIndustriModel();
            $id_mahasiswa = session()->get('id_pengguna');
            $id_perusahaan = $this->request->getPost('id_perusahaan');
            $checkMhs = $mPraktikIndustri->where('id_mahasiswa', $id_mahasiswa);

            if ($checkMhs->countAllResults() < 1) {
                $mPraktikIndustri->save([
                    'id_mahasiswa' => $id_mahasiswa,
                    'id_perusahaan' => $id_perusahaan,
                    'status_praktik_industri' => 'Data belum lengkap',
                ]);

                $response = [
                    'status' => true,
                    'id' => $mPraktikIndustri->insertID ?? null,
                    'msg' => 'Perusahaan praktik industri berhasil dipilih',
                ];
            } else {

                if ($checkMhs->where('status_praktik_industri != ', 'Ditolak')->countAllResults() > 0) {
                    $response = [
                        'status' => false,
                        'id' => null,
                        'msg' => 'Anda sudah memilih perusahaan praktik industri',
                    ];
                } else {
                    $mPraktikIndustri->save([
                        'id_mahasiswa' => $id_mahasiswa,
                        'id_perusahaan' => $id_perusahaan,
                        'status_praktik_industri' => 'Data belum lengkap',
                    ]);

                    $response = [
                        'status' => true,
                        'id' => $mPraktikIndustri->insertID ?? null,
                        'msg' => 'Perusahaan praktik industri berhasil pilih kembali',
                    ];
                }
            }

            echo json_encode($response);
        } else {

            $mPerusahaan = new PerusahaanModel();
            $nama_perusahaan = $this->request->getPost('nama_perusahaan');
            $alamat_perusahaan = $this->request->getPost('alamat_perusahaan');
            $telp_perusahaan = $this->request->getPost('telp_perusahaan');
            $email_perusahaan = $this->request->getPost('email_perusahaan');
            $web_perusahaan = $this->request->getPost('web_perusahaan');
            $long_perusahaan = $this->request->getPost('long_perusahaan');
            $lat_perusahaan = $this->request->getPost('lat_perusahaan');

            $mPraktikIndustri = new PraktikIndustriModel();
            $id_mahasiswa = session()->get('id_pengguna');
            $checkMhs = $mPraktikIndustri->where('id_mahasiswa', $id_mahasiswa);

            if ($checkMhs->where('status_praktik_industri != ', 'Ditolak')->countAllResults() > 0) {
                session()->setFlashdata('error', 'Pengajuan perusahaan gagal! Anda sudah memilih perusahaan praktik industri');
                return redirect()->to('/mahasiswa/praktikindustri/history');
            } else {

                $input = $this->validate([
                    'nama_perusahaan' => 'required|min_length[3]|max_length[150]',
                    'alamat_perusahaan' => 'required|min_length[3]|max_length[225]',
                    'telp_perusahaan' => 'required|min_length[8]|max_length[20]',
                ]);

                if (!$input) {
                    session()->setFlashdata('errors', $this->validator->getErrors());
                    return redirect()->back()->withInput();
                }

                $status = $mPerusahaan->save([
                    'nama_perusahaan' => $nama_perusahaan,
                    'alamat_perusahaan' => $alamat_perusahaan,
                    'telp_perusahaan' => $telp_perusahaan,
                    'email_perusahaan' => $email_perusahaan,
                    'web_perusahaan' => $web_perusahaan,
                    'long_perusahaan' => $long_perusahaan,
                    'lat_perusahaan' => $lat_perusahaan,
                    'status_perusahaan' => 'Perusahaan menunggu konfirmasi admin',
                ]);

                $status = $mPraktikIndustri->save([
                    'id_mahasiswa' => $id_mahasiswa,
                    'id_perusahaan' =>  $mPerusahaan->insertID ?? null,
                    'status_praktik_industri' => 'Data belum lengkap',
                ]);

                if (!$status) {
                    session()->setFlashdata('errors', 'Data perusahaan gagal ditambahkan');
                    return redirect()->back()->withInput();
                } else {
                    session()->setFlashdata('success', 'Data perusahaan berhasil ditambahkan');
                    return redirect()->to('/mahasiswa/praktikindustri/history');
                }
            }
        }
    }

    public function PraktikIndustriUpdate()
    {
        $mPraktikIndustri = new PraktikIndustriModel();
        $mPraktikIndustriNilai = new PraktikIndustriNilaiModel();
        $mDokumen = new DokumenModel();
        $id = $this->request->getPost('idPI');
        $wktAwlPI = $this->request->getPost('wktAwlPI');
        $wktAkrPI = $this->request->getPost('wktAkrPI');
        $dokPengPI = $this->request->getFile('dokPengPI');
        $nilPI = $this->request->getPost('nilPI');
        $dokNilPI = $this->request->getFile('dokNilPI');

        if (!empty($wktAwlPI) || !empty($wktAkrPI) || !empty($dokPengPI)) {
            $inputA = $this->validate([
                'dokPengPI' => [
                    'uploaded[dokPengPI]',
                    'mime_in[dokPengPI,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[dokPengPI,4096]',
                ],
                'wktAwlPI' => 'required',
                'wktAkrPI' => 'required',
            ]);

            if (!$inputA) {
                session()->setFlashdata('errors', $this->validator->getErrors());
                return redirect()->back()->withInput();
            } else {

                $path = 'uploads/praktik_industri/pengajuan/';
                $judul_dokumen = "Pengajuan Praktik Industri - " . session()->get('nim_nip') . ' - ' . session()->get('nama_lengkap') . ' - ' . time();
                $format_dokumen = $dokPengPI->getExtension();
                $ukuran_dokumen = $dokPengPI->getSize();
                $dokPengPI->move($path, $judul_dokumen . '.' . $format_dokumen);

                $status = $mDokumen->save([
                    'judul_dokumen' => $judul_dokumen,
                    'format_dokumen' => $format_dokumen,
                    'ukuran_dokumen' => $ukuran_dokumen . ' KB',
                    'path_dokumen' => $path . $judul_dokumen . '.' . $format_dokumen,
                    'status_dokumen' => 'Private',
                ]);

                $status = $mPraktikIndustri->update($id, [
                    'waktu_awal_praktik_industri' => $wktAwlPI,
                    'waktu_akhir_praktik_industri' => $wktAkrPI,
                    'status_praktik_industri' => 'Pengajuan praktik industri menunggu konfirmasi admin',
                    'id_dokumen' => $mDokumen->insertID ?? null,
                ]);
            }
        }

        if (!empty($dokNilPI) || !empty($nilPI)) {
            $inputB = $this->validate([
                'dokNilPI' => [
                    'uploaded[dokNilPI]',
                    'mime_in[dokNilPI,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[dokNilPI,4096]',
                ],
                'nilPI' => 'required',
            ]);

            if (!$inputB) {
                session()->setFlashdata('errors', $this->validator->getErrors());
                return redirect()->back()->withInput();
            } else {

                $path = 'uploads/praktik_industri/penilaian/';
                $judul_dokumen = "Penilaian Praktik Industri - " . session()->get('nim_nip') . ' - ' . session()->get('nama_lengkap') . ' - ' . time();
                $format_dokumen = $dokNilPI->getExtension();
                $ukuran_dokumen = $dokNilPI->getSize();
                $dokNilPI->move($path, $judul_dokumen . '.' . $format_dokumen);

                $status = $mDokumen->save([
                    'judul_dokumen' => $judul_dokumen,
                    'format_dokumen' => $format_dokumen,
                    'ukuran_dokumen' => $ukuran_dokumen . ' KB',
                    'path_dokumen' => $path . $judul_dokumen . '.' . $format_dokumen,
                    'status_dokumen' => 'Private',
                ]);

                $status = $mPraktikIndustriNilai->save([
                    'id_praktik_industri' => $id,
                    'nilai_praktik_industri' => $nilPI,
                    'id_dokumen' => $mDokumen->insertID ?? null,
                ]);

                $status = $mPraktikIndustri->update($id, [
                    'status_praktik_industri' => 'Penilaian praktik industi menunggu konfirmasi admin',
                ]);
            }
        }

        if ($status) {
            session()->setFlashdata('success', 'Data praktik industri berhasil diperbarui');
            return redirect()->to('mahasiswa/praktikindustri/history/detail?id=' . $id);
        } else {
            session()->setFlashdata('errors', 'Data praktik industri gagal diperbarui');
            return redirect()->back()->withInput();
        }
    }
}
