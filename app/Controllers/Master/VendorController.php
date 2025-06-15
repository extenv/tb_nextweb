<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\VendorModel; //fetch model vendor

class VendorController extends BaseController
{
    public function index()
{
    $vendorModel = new VendorModel();

    // Ambil kata kunci pencarian jika ada
    $search = $this->request->getGet('search');

    if ($search) {
        $vendorModel->like('nama_vendor', $search);
    }

    // Ambil data vendor dengan pagination (10 per halaman)
    $data['vendors'] = $vendorModel->paginate(10);
    $data['pager'] = $vendorModel->pager;

    return view('Master/Vendor', $data);
}

    public function create()
    {
        return view('Master/VendorForm');
    }

    public function store()
    {
        // Logic to store vendor data
        $vendorModel = new VendorModel();

        // Get input data from request
        $data = [
            'nama_vendor' => $this->request->getPost('nama_vendor'),
            'alamat'      => $this->request->getPost('alamat'),
            // Tambahkan field lain sesuai kebutuhan
        ];

        // Simpan data ke database
        $vendorModel->insert($data);
        return redirect()->to('/vendor')->with('success', 'Vendor created successfully!');
    }

    public function edit($id)
    {
        // Logic to get vendor data by ID and pass it to the view
        $vendorModel = new VendorModel();
        $data['vendor'] = $vendorModel->find($id); // Fetch vendor data by ID
        if (!$data['vendor']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Vendor not found');
        }
        return view('Master/VendorForm', $data);
    }

    public function update($id)
    {
        // Logic to update vendor data by ID
        $vendorModel = new VendorModel();

        // Get input data from request
        $data = [
            'nama_vendor' => $this->request->getPost('nama_vendor'),
            'alamat'      => $this->request->getPost('alamat'),
            // Tambahkan field lain sesuai kebutuhan
        ];

        // Update data di database berdasarkan ID
        $vendorModel->update($id, $data);
        return redirect()->to('/vendor')->with('success', 'Vendor updated successfully!');
    }

    public function delete($id)
    {
        // Logic to delete vendor data by ID
        $vendorModel = new VendorModel();
        $vendor = $vendorModel->find($id);
        if (!$vendor) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Vendor not found');
        }
        $vendorModel->delete($id);
        return redirect()->to('/vendor')->with('success', 'Vendor deleted successfully!');
    }
    
}
