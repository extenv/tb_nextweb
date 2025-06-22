<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Models\KategoriTenderModel;

class KategoriTender extends BaseController
{
    public function index()
    {
        $kategoriModel = new KategoriTenderModel();
        $search = $this->request->getGet('search');

        if ($search) {
            $kategoriModel->like('nama_kategori', $search);
        }

        $data['kategori_tenders'] = $kategoriModel->paginate(10);
        $data['pager'] = $kategoriModel->pager;

        return view('Master/Kategori_Tender', $data);
    }

    public function create()
    {
        $data['kategori'] = null;
        return view('Master/Kategori_TenderForm', $data);
    }

    public function store()
    {
        $kategoriModel = new KategoriTenderModel();

        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ];

        $kategoriModel->insert($data);

        return redirect()->to('/kategori_tender')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kategoriModel = new KategoriTenderModel();
        $data['kategori'] = $kategoriModel->find($id);

        if (!$data['kategori']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Kategori tidak ditemukan');
        }

        return view('Master/Kategori_TenderForm', $data);
    }

    public function update($id)
    {
        $kategoriModel = new KategoriTenderModel();

        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ];

        $kategoriModel->update($id, $data);

        return redirect()->to('/kategori_tender')->with('success', 'Kategori berhasil diupdate!');
    }

    public function delete($id)
    {
        $kategoriModel = new KategoriTenderModel();
        $kategoriModel->delete($id);

        return redirect()->to('/kategori_tender')->with('success', 'Kategori berhasil dihapus!');
    }
}
