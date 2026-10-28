<?php

namespace App\Controllers;

use App\Models\SiswaModel;

class Home extends BaseController
{
    public function index(): string
    {
        $siswaModel = new SiswaModel();
        $data['siswa'] = $siswaModel->getSiswa();

        return view('siswa_view', $data);
    }

    // Method untuk menyimpan data siswa baru
    public function tambah()
    {
        $siswaModel = new SiswaModel();

        $siswaModel->save([
            'nis'   => $this->request->getPost('nis'),
            'nama'  => $this->request->getPost('nama'),
            'kelas' => $this->request->getPost('kelas'),
        ]);

        return redirect()->to(base_url());
    }

    // Method untuk memperbarui data siswa
    public function edit($id)
    {
        $siswaModel = new SiswaModel();

        // Memperbarui data berdasarkan ID dan inputan form
        $siswaModel->update($id, [
            'nis'   => $this->request->getPost('nis'),
            'nama'  => $this->request->getPost('nama'),
            'kelas' => $this->request->getPost('kelas'),
        ]);

        // Kembali ke halaman utama
        return redirect()->to(base_url());
    }

    // Method untuk menghapus data siswa
    public function hapus($id)
    {
        $siswaModel = new SiswaModel();

        // Hapus data berdasarkan ID
        $siswaModel->delete($id);

        // Kembali ke halaman utama
        return redirect()->to(base_url());
    }
}

