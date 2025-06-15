<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Models\SertifikasiTenderModel;
use App\Models\TenderModel;

class SertifikasiTender extends BaseController
{
    public function index()
    {
        $model = new SertifikasiTenderModel();
        $search = $this->request->getGet('search');

        if ($search) {
            $model->like('nama_sertifikat', $search);
        }

        $data['sertifikasi'] = $model->select('sertifikasi_tender.*, tender.nama_tender')
                                     ->join('tender', 'tender.tender_id = sertifikasi_tender.tender_id', 'left')
                                     ->paginate(10);
        $data['pager'] = $model->pager;

        return view('Master/Sertifikasi_Tender', $data);
    }

    public function create()
    {
        $data['sertifikat'] = null;
        $data['tenders'] = (new TenderModel())->findAll();

        return view('Master/Sertifikasi_TenderForm', $data);
    }

    public function store()
    {
        $model = new SertifikasiTenderModel();

        $data = [
            'tender_id'       => $this->request->getPost('tender_id'),
            'nama_sertifikat' => $this->request->getPost('nama_sertifikat'),
            'created_at'      => date('Y-m-d H:i:s'),
            'updated_at'      => date('Y-m-d H:i:s'),
        ];

        $model->insert($data);

        return redirect()->to('/sertifikasi_tender')->with('success', 'Sertifikasi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $model = new SertifikasiTenderModel();
        $data['sertifikasi'] = $model->find($id);

        if (!$data['sertifikasi']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Sertifikat tidak ditemukan');
        }

        $data['tenders'] = (new TenderModel())->findAll();

        return view('Master/Sertifikasi_TenderForm', $data);
    }

    public function update($id)
    {
        $model = new SertifikasiTenderModel();

        $data = [
            'tender_id'       => $this->request->getPost('tender_id'),
            'nama_sertifikat' => $this->request->getPost('nama_sertifikat'),
            'updated_at'      => date('Y-m-d H:i:s'),
        ];

        $model->update($id, $data);

        return redirect()->to('/sertifikasi_tender')->with('success', 'Sertifikasi berhasil diupdate!');
    }

    public function delete($id)
    {
        $model = new SertifikasiTenderModel();
        $model->delete($id);

        return redirect()->to('/sertifikasi_tender')->with('success', 'Sertifikasi berhasil dihapus!');
    }
}
