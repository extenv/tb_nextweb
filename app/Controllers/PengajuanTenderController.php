<?php
namespace App\Controllers;

use App\Models\PengajuanTenderModel;
use App\Models\VendorModel;
use App\Models\TenderModel;
use CodeIgniter\RESTful\ResourceController;

class PengajuanTenderController extends BaseController
{
    protected $model;
    protected $vendorModel;
    protected $tenderModel;

    public function __construct()
    {
        $this->model = new PengajuanTenderModel();
        $this->vendorModel = new VendorModel();
        $this->tenderModel = new TenderModel();
    }

    public function index()
    {
        $model = new PengajuanTenderModel();
        $data['pengajuanList'] = $model->getWithJoins(); // metode custom join
        return view('PengajuanTender', $data);
    }

    public function show($id = null)
    {
        $pengajuan = $this->model->getWithDetails($id);
        if (!$pengajuan) {
            return $this->response->setStatusCode(404)->setJSON([
                'message' => 'Pengajuan tidak ditemukan.'
            ]);
        }
        return $this->response->setJSON($pengajuan);
    }

    public function create()
{
    $vendor = $this->vendorModel->findAll();
    $tender = $this->tenderModel->findAll();

    return view('FormPengajuanTender', [
        'vendor' => $vendor,
        'tender' => $tender
    ]);
}


    public function store()
    {
        $data = [
            'vendor_id'         => $this->request->getPost('vendor_id'),
            'tender_id'         => $this->request->getPost('tender_id'),
            'tanggal_pengajuan' => $this->request->getPost('tanggal_pengajuan'),
            'status'            => $this->request->getPost('status')
        ];

        if (empty(array_filter($data))) {
            return redirect()->back()->with('error', 'Data tidak boleh kosong.');
        }

        $this->model->insert($data);
        return redirect()->to('/pengajuan')->with('success', 'Pengajuan berhasil disimpan.');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('/pengajuan')->with('success', 'Pengajuan berhasil dihapus.');
    }


    public function update()
{
    $pengajuanModel = new \App\Models\PengajuanTenderModel();

    // Pastikan input pengajuan_id tidak kosong
    $id = $this->request->getPost('pengajuan_id');

    if (!$id) {
        return redirect()->back()->with('error', 'ID pengajuan tidak ditemukan.');
    }

    $data = [
        'vendor_id'         => $this->request->getPost('vendor_id'),
        'tender_id'         => $this->request->getPost('tender_id'),
        'tanggal_pengajuan' => $this->request->getPost('tanggal_pengajuan'),
        'status'            => $this->request->getPost('status'),
        'updated_at'        => date('Y-m-d H:i:s')
    ];

    // Perbaiki: pastikan $id tidak kosong di sini
    $pengajuanModel->update($id, $data);

    return redirect()->to('/pengajuan')->with('success', 'Data pengajuan berhasil diperbarui.');
}

}
