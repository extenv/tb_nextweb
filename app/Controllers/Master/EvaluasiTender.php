<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Models\EvaluasiTenderModel;

class EvaluasiTender extends BaseController
{
    protected $evaluasiModel;

    public function __construct()
    {
        $this->evaluasiModel = new EvaluasiTenderModel();
    }

    /**
     * Tampilkan semua evaluasi tender (dengan join)
     */
    public function index()
    {
        $data['evaluasi'] = $this->evaluasiModel->getAllWithJoin();

        return view('Transaction/index', $data);
    }

    /**
     * Detail evaluasi tender berdasarkan ID
     */
    public function show($id)
    {
        $data['evaluasi'] = $this->evaluasiModel->getByIdWithJoin($id);

        if (!$data['evaluasi']) {
            return redirect()->back()->with('error', 'Data evaluasi tidak ditemukan');
        }

        return view('evaluasi_tender/detail', $data);
    }

    /**
     * Simpan data evaluasi tender baru
     */
    public function store()
    {
        $this->validate([
            'pengajuan_id' => 'required|is_not_unique[pengajuan_tender.pengajuan_id]',
            'nilai_teknis' => 'required|decimal',
            'nilai_administrasi' => 'required|decimal',
            'nilai_harga' => 'required|decimal',
        ]);

        $this->evaluasiModel->save([
            'pengajuan_id' => $this->request->getPost('pengajuan_id'),
            'nilai_teknis' => $this->request->getPost('nilai_teknis'),
            'nilai_administrasi' => $this->request->getPost('nilai_administrasi'),
            'nilai_harga' => $this->request->getPost('nilai_harga'),
            'catatan' => $this->request->getPost('catatan'),
        ]);

        return redirect()->to('/evaluasi-tender')->with('success', 'Data evaluasi berhasil disimpan');
    }

    /**
     * Update evaluasi tender
     */
    public function update($id)
    {
        $this->validate([
            'nilai_teknis' => 'required|decimal',
            'nilai_administrasi' => 'required|decimal',
            'nilai_harga' => 'required|decimal',
        ]);

        $this->evaluasiModel->update($id, [
            'nilai_teknis' => $this->request->getPost('nilai_teknis'),
            'nilai_administrasi' => $this->request->getPost('nilai_administrasi'),
            'nilai_harga' => $this->request->getPost('nilai_harga'),
            'catatan' => $this->request->getPost('catatan'),
        ]);

        return redirect()->to('/evaluasi-tender')->with('success', 'Data evaluasi berhasil diperbarui');
    }

    /**
     * Hapus evaluasi tender
     */
    public function delete($id)
    {
        $this->evaluasiModel->delete($id);

        return redirect()->to('/evaluasi-tender')->with('success', 'Data evaluasi berhasil dihapus');
    }
}
