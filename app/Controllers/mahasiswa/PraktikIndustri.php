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
        $mPraktikIndustri = new PraktikIndustriModel();
        $data['PraktikIndustri'] = $mPraktikIndustri->getDtDetail($this->request->getGet('id'));
        return view('_mahasiswa/PraktikIndustri/PraktikIndustriHistoryDetail', $data);
    }

    public function PraktikIndustriCreate()
    {
        $selected = $this->request->getPost('selected');

        if ($selected == true) {

            $mPraktikIndustri = new PraktikIndustriModel();
            $id_mahasiswa = session()->get('id_pengguna');
            $id_perusahaan = $this->request->getPost('id_perusahaan');
            $status_praktik_industri = 'Data Belum Lengkap';
            $checkMhs = $mPraktikIndustri->where('id_mahasiswa', $id_mahasiswa);

            if ($checkMhs->countAllResults() < 1) {
                $mPraktikIndustri->save([
                    'id_mahasiswa' => $id_mahasiswa,
                    'id_perusahaan' => $id_perusahaan,
                    'status_praktik_industri' => $status_praktik_industri,
                ]);

                $response = [
                    'status' => true,
                    'id' => $mPraktikIndustri->insertID ?? null,
                    'msg' => 'Praktik Industri berhasil diajukan',
                ];
            } else {

                if ($checkMhs->where('status_praktik_industri != ', 'Ditolak')->countAllResults() > 0) {
                    $response = [
                        'status' => false,
                        'id' => null,
                        'msg' => 'Anda sudah mengajukan praktik industri',
                    ];
                } else {
                    $mPraktikIndustri->save([
                        'id_mahasiswa' => $id_mahasiswa,
                        'id_perusahaan' => $id_perusahaan,
                        'status_praktik_industri' => $status_praktik_industri,
                    ]);

                    $response = [
                        'status' => true,
                        'id' => $mPraktikIndustri->insertID ?? null,
                        'msg' => 'Praktik Industri berhasil diajukan kembali',
                    ];
                }
            }

            echo json_encode($response);
        } else {

            $model = new PerusahaanModel();
            $nama_perusahaan = $this->request->getPost('nama_perusahaan');
            $alamat_perusahaan = $this->request->getPost('alamat_perusahaan');
            $telp_perusahaan = $this->request->getPost('telp_perusahaan');
            $email_perusahaan = $this->request->getPost('email_perusahaan');
            $web_perusahaan = $this->request->getPost('web_perusahaan');
            $long_perusahaan = $this->request->getPost('long_perusahaan');
            $lat_perusahaan = $this->request->getPost('lat_perusahaan');
            $status_praktik_industri = 'Menunggu Konfirmasi';

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
                'status_praktik_industri' => $status_praktik_industri,
            ]);

            if (!$create) {
                session()->setFlashdata('errors', 'Data perusahaan gagal ditambahkan');
                return redirect()->back()->withInput();
            } else {
                session()->setFlashdata('success', 'Data perusahaan berhasil ditambahkan');
                return redirect()->to('/mahasiswa/praktikindustri/history');
            }
        }
    }

    public function PraktikIndustriUpdate()
    {
        $mPraktikIndustri = new PraktikIndustriModel();
        $mPraktikIndustriNilai = new PraktikIndustriNilaiModel();
        $mDokumen = new DokumenModel();
        $id = $this->request->getPost('id_praktik_industri');
        $wkt_awal = $this->request->getPost('waktu_awal_praktik_industri');
        $wkt_akhir = $this->request->getPost('waktu_akhir_praktik_industri');
        $dok_peng_pi = $this->request->getFile('dokumen_pengajuan_praktik_industri');
        $nil_pi = $this->request->getPost('nilai_praktik_industri');
        $dok_nil_pi = $this->request->getFile('dokumen_nilai_praktik_industri');

        $inputA = $this->validate([
            'dokumen_pengajuan_praktik_industri' => 'required',
        ]);

        if (!$inputA) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        } else {
            $path = 'uploads/praktik_industri/pengajuan/';
            $judul_dokumen = "Pengajuan Praktik Industri - " . session()->get('nim_nip') . ' - ' . session()->get('nama_lengkap') . ' - ' . time();
            $format_dokumen = $dok_peng_pi->getExtension();
            $ukuran_dokumen = $dok_peng_pi->getSize();
            $dok_peng_pi->move($path, $judul_dokumen . '.' . $format_dokumen);

            $inputC = $this->validate([
                'waktu_awal_praktik_industri' => 'required',
                'waktu_akhir_praktik_industri' => 'required',
            ]);

            if (!$inputC) {
                session()->setFlashdata('errors', $this->validator->getErrors());
                return redirect()->back()->withInput();
            } else {
                $mDokumen->save([
                    'judul_dokumen' => $judul_dokumen,
                    'format_dokumen' => $format_dokumen,
                    'ukuran_dokumen' => $ukuran_dokumen . ' KB',
                    'path_dokumen' => $path . $judul_dokumen . '.' . $format_dokumen,
                    'status_dokumen' => 'Private',
                ]);
            }
        }

        // $inputB = $this->validate([
        //     'dokumen_nilai_praktik_industri' => 'required',
        // ]);
        // $inputD = $this->validate([
        //     'nilai_praktik_industri' => 'required',
        // ]);
        // if ($inputB) {
        //     session()->setFlashdata('errors', $this->validator->getErrors());
        //     return redirect()->back()->withInput();
        // } else {
        //     $path = 'uploads/praktik_industri/penilaian/';
        //     $judul_dokumen = "Penilaian Praktik Industri - " . session()->get('nim_nip') . ' - ' . session()->get('nama_lengkap') . ' - ' . time();
        //     $format_dokumen = $dok_nil_pi->getExtension();
        //     $ukuran_dokumen = $dok_nil_pi->getSize();
        //     $dok_nil_pi->move($path, $judul_dokumen . '.' . $format_dokumen);

        //     if ($inputD) {
        //         session()->setFlashdata('errors', $this->validator->getErrors());
        //         return redirect()->back()->withInput();
        //     } else {
        //         $mDokumen->save([
        //             'judul_dokumen' => $judul_dokumen,
        //             'format_dokumen' => $format_dokumen,
        //             'ukuran_dokumen' => $ukuran_dokumen . ' KB',
        //             'path_dokumen' => $path . $judul_dokumen . '.' . $format_dokumen,
        //             'status_dokumen' => 'Private',
        //         ]);
        //     }
        // }





















        // $inputB = $this->validate([
        //     'nilai_praktik_industri' => 'required',
        //     'dokumen_nilai_praktik_industri' => 'required',
        // ]);

        // if (!$inputB) {
        //     session()->setFlashdata('errors', $this->validator->getErrors());
        //     return redirect()->back()->withInput();
        // } else {
        //     $namaDokNilPI = "Nilai Praktik Industri - " . session()->get('nim_nip') . ' - ' . session()->get('nama_lengkap') . ' - ' . time() . '.' . $dok_nil_pi->getExtension();
        //     $dok_nil_pi->move('uploads/praktik_industri/nilai', $namaDokNilPI);
        // }


























        // if (!empty($wkt_awal) || !empty($wkt_akhir) || !empty($dok_peng_pi)) {
        //     $valid = $this->validate([
        //         'id_praktik_industri' => 'required',
        //         'waktu_awal_praktik_industri' => 'required',
        //         'waktu_akhir_praktik_industri' => 'required',
        //         'dokumen_pengajuan_praktik_industri' => 'required',
        //     ]);

        //     if (!$valid) {
        //         session()->setFlashdata('errors', $this->validator->getErrors());
        //         return redirect()->back()->withInput();
        //     }

        //     try {
        // if ($dok_peng_pi->isValid() && ! $dok_peng_pi->hasMoved())
        // {
        //     $dok_peng_pi->move(ROOTPATH.'public/uploads/', $namaDok);
        //     session()->setFlashData('message','Berhasil upload');
        // }else{
        //     session()->setFlashData('message','Gagal upload');
        // }










        // $mPraktikIndustri->update($id, [
        //     'waktu_awal_praktik_industri' => $wkt_awal,
        //     'waktu_akhir_praktik_industri' => $wkt_akhir,
        // ]);
        // session()->setFlashdata('success', 'Data berhasil diubah');
        // return redirect()->to('/mahasiswa/praktikindustri/history/detail?id=' . $id);
        //     } catch (\Exception $e) {
        //         session()->setFlashdata('errors', 'Data gagal diubah');
        //         return redirect()->back()->withInput();
        //     }
        // }

        // if (!empty($nil_pi) || !empty($dok_nil_pi)) {
        //     $valid = $this->validate([
        //         'id_praktik_industri' => 'required',
        //         'nilai_praktik_industri' => 'required',
        //         // 'dokumen_nilai_praktik_industri' => 'required',
        //     ]);

        //     if (!$valid) {
        //         session()->setFlashdata('errors', $this->validator->getErrors());
        //         return redirect()->back()->withInput();
        //     }

        //     try {
        //         $check = $mPraktikIndustriNilai->where('id_praktik_industri', $id);
        //         if ($check->countAllResults() > 0) {
        //             $mPraktikIndustriNilai->update($id, [
        //                 'nilai_praktik_industri' => $nil_pi,
        //             ]);
        //         } else {
        //             $mPraktikIndustriNilai->save([
        //                 'id_praktik_industri' => $id,
        //                 'nilai_praktik_industri' => $nil_pi,
        //                 'id_dokumen' => null,
        //             ]);
        //         }
        //         session()->setFlashdata('success', 'Data berhasil diubah');
        //         return redirect()->to('/mahasiswa/praktikindustri/history/detail?id=' . $id);
        //     } catch (\Exception $e) {
        //         session()->setFlashdata('errors', 'Data gagal diubah');
        //         return redirect()->back()->withInput();
        //     }
        // }
    }
}
