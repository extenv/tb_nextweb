<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Models\EvaluasiTenderModel;
use App\Models\PengajuanTenderModel;

class EvaluasiTender extends BaseController
{
    protected $evaluasiModel;
    protected $pengajuanModel;

    public function __construct()
    {
        $this->evaluasiModel = new EvaluasiTenderModel();
        $this->pengajuanModel = new PengajuanTenderModel();
    }

    public function index()
    {
        $data['evaluasi'] = $this->evaluasiModel->getAllWithJoin();

        return view('Transaction/index', $data);
    }

    public function create()
    {
        // Ambil semua pengajuan yang bisa ditampilkan di dropdown
        $data['pengajuanList'] = $this->pengajuanModel
            ->select('pengajuan_tender.pengajuan_id, vendor.nama_vendor, tender.nama_tender')
            ->join('vendor', 'vendor.vendor_id = pengajuan_tender.vendor_id')
            ->join('tender', 'tender.tender_id = pengajuan_tender.tender_id')
            ->findAll();

        $data['evaluasi'] = null;

        return view('Transaction/evaluasi_tenderForm', $data);
    }

   public function show($id)
{
    $evaluasi = $this->evaluasiModel->getByIdWithJoin($id);

    if (!$evaluasi) {
        return redirect()->back()->with('error', 'Data evaluasi tidak ditemukan');
    }

    $pengajuanList = $this->pengajuanModel
        ->select('pengajuan_tender.pengajuan_id, vendor.nama_vendor, tender.nama_tender')
        ->join('vendor', 'vendor.vendor_id = pengajuan_tender.vendor_id')
        ->join('tender', 'tender.tender_id = pengajuan_tender.tender_id')
        ->findAll();

    return view('Transaction/evaluasi_tenderForm', [
        'evaluasi' => $evaluasi,
        'pengajuanList' => $pengajuanList,
    ]);
}


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

    public function edit($id)
    {
        $evaluasi = $this->evaluasiModel->getByIdWithJoin($id);

        if (!$evaluasi) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $pengajuanList = $this->pengajuanModel
            ->select('pengajuan_tender.pengajuan_id, vendor.nama_vendor, tender.nama_tender')
            ->join('vendor', 'vendor.vendor_id = pengajuan_tender.vendor_id')
            ->join('tender', 'tender.tender_id = pengajuan_tender.tender_id')
            ->findAll();

        return view('Transaction/evaluasi_tenderForm', [
            'evaluasi' => $evaluasi,
            'pengajuanList' => $pengajuanList,
        ]);
    }

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

    public function delete($id)
    {
        $this->evaluasiModel->delete($id);

        return redirect()->to('/evaluasi-tender')->with('success', 'Data evaluasi berhasil dihapus');
    }
}
