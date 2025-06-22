<?php

namespace App\Models;

use CodeIgniter\Model;

class EvaluasiTenderModel extends Model
{
    protected $table            = 'evaluasi_tender';
    protected $primaryKey       = 'evaluasi_id';
    protected $allowedFields    = [
        'pengajuan_id',
        'nilai_teknis',
        'nilai_administrasi',
        'nilai_harga',
        'catatan',
        'created_at',
        'updated_at'
    ];
    protected $useTimestamps = true;

    /**
     * Join ke tabel pengajuan_tender, vendor, dan tender
     * 
     * @return \CodeIgniter\Database\BaseBuilder
     */
    public function getFullEvaluasiQuery()
    {
        return $this->select('
                evaluasi_tender.*,
                pengajuan_tender.tanggal_pengajuan,
                pengajuan_tender.status AS status_pengajuan,
                vendor.nama_vendor,
                tender.nama_tender,
                tender.instansi
            ')
            ->join('pengajuan_tender', 'pengajuan_tender.pengajuan_id = evaluasi_tender.pengajuan_id')
            ->join('vendor', 'vendor.vendor_id = pengajuan_tender.vendor_id')
            ->join('tender', 'tender.tender_id = pengajuan_tender.tender_id');
    }

    /**
     * Ambil semua data evaluasi + join
     */
    public function getAllWithJoin()
    {
        return $this->getFullEvaluasiQuery()->findAll();
    }

    /**
     * Ambil satu data berdasarkan evaluasi_id
     */
    public function getByIdWithJoin($id)
    {
        return $this->getFullEvaluasiQuery()
                    ->where('evaluasi_tender.evaluasi_id', $id)
                    ->first();
    }

    /**
     * Ambil semua evaluasi berdasarkan tender_id
     */
    public function getByTenderId($tenderId)
    {
        return $this->getFullEvaluasiQuery()
                    ->where('pengajuan_tender.tender_id', $tenderId)
                    ->findAll();
    }
}
