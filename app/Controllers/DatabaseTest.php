<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;

class DatabaseTest extends Controller
{
    public function index()
    {
        try {
            $db = Database::connect();
            $data = $db->table('siswa')->get()->getResultArray();

            return $this->response->setJSON([
                'status' => 'Berhasil terhubung!',
                'jumlah_siswa' => count($data),
                'data_siswa' => $data,
            ]);
        } catch (\Throwable $e) {
            return $this->response->setStatusCode(500)
                ->setBody('Koneksi gagal: ' . $e->getMessage());
        }
    }
}
