<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Models\TenderModel;

class TenderController extends BaseController
{
    public function index()
{
    $vendorModel = new TenderModel();
    // Ambil kata kunci pencarian jika ada
    $search = $this->request->getGet('search');

    $tenderModel = new TenderModel();

    if ($search) {
        $tenderModel->like('nama_tender', $search);
    }

    // Ambil data tender dengan pagination (10 per halaman)
    $data['tenders'] = $tenderModel->paginate(10);
    $data['pager'] = $tenderModel->pager;

    return view('Master/Tender', $data);
}

    public function create()
    {
        // Tampilkan form kosong untuk tambah tender
        $data['tender'] = null;
        return view('Master/TenderForm', $data);
    }

    public function store()
    {
        $tenderModel = new TenderModel();

        $data = [
            'nama_tender' => $this->request->getPost('nama_tender'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'nilai_pagu'  => $this->request->getPost('nilai_pagu'),
            'instansi'    => $this->request->getPost('instansi'),
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s'),
            // Tambahkan field lain sesuai kebutuhan
        ];

        $tenderModel->insert($data);

        return redirect()->to('/tender')->with('success', 'Tender berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $tenderModel = new TenderModel();
        $data['tender'] = $tenderModel->find($id);

        if (!$data['tender']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Tender tidak ditemukan');
        }

        return view('Master/TenderForm', $data);
    }

    public function update($id)
    {
        $tenderModel = new TenderModel();

        $data = [
            'nama_tender' => $this->request->getPost('nama_tender'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'nilai_pagu'  => $this->request->getPost('nilai_pagu'),
            'instansi'    => $this->request->getPost('instansi'),
            'updated_at'  => date('Y-m-d H:i:s'),
            // Tambahkan field lain sesuai kebutuhan
        ];

        $tenderModel->update($id, $data);

        return redirect()->to('/tender')->with('success', 'Tender berhasil diupdate!');
    }

    public function delete($id)
    {
        $tenderModel = new TenderModel();
        $tenderModel->delete($id);

        return redirect()->to('/tender')->with('success', 'Tender berhasil dihapus!');
    }
}
