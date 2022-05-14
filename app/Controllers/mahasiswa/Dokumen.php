<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;

class Dokumen extends BaseController
{
    public function DokumenUpload()
    {
        $file =  $this->request->getFile('dokumen');
		$randomName = $file->getRandomName();
		if ($file->isValid() && ! $file->hasMoved())
		{
		    $file->move(ROOTPATH.'public/uploads/',$randomName);
		    session()->setFlashData('message','Berhasil upload');
		}else{
			session()->setFlashData('message','Gagal upload');
		}

    }
}
