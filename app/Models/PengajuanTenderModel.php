<?php
namespace App\Models;

use CodeIgniter\Model;

class PengajuanTenderModel extends Model
{
    protected $table            = 'pengajuan_tender';
    protected $primaryKey       = 'pengajuan_id';
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'vendor_id',
        'tender_id',
        'tanggal_pengajuan',
        'status'
    ];

    // Ambil semua pengajuan dengan data vendor & tender
    public function getWithJoins($id = null)
    {
        $builder = $this->db->table($this->table);
        $builder->select('
            pengajuan_tender.*,
            vendor.nama_vendor,
            tender.nama_tender
        ');
        $builder->join('vendor', 'vendor.vendor_id = pengajuan_tender.vendor_id');
        $builder->join('tender', 'tender.tender_id = pengajuan_tender.tender_id');

        if ($id !== null) {
            $builder->where('pengajuan_tender.pengajuan_id', $id);
            return $builder->get()->getRowArray();
        }

        return $builder->get()->getResultArray();
    }
}
