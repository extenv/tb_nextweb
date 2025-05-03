<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TenderModel; //fetch model tender

class TenderController extends BaseController
{
    public function index()
    {
        // Logic to get all tender data and pass it to the view
        // For example, using a model to fetch data:
        $tenderModel = new TenderModel();
        $data['tenders'] = $tenderModel->findAll(); // Fetch all tender data
        // Pass the data to the view
        return view('Master/Tender', $data);
    }

    public function create()
    {
        return view('Master/TenderForm');
    }

    public function store()
    {
        // Logic to store tender data
        return redirect()->to('/tender')->with('success', 'Tender created successfully!');
    }

    public function edit($id)
    {
        // Logic to get tender data by ID and pass it to the view
        $tenderModel = new TenderModel();
        $data['tender'] = $tenderModel->find($id); // Fetch tender data by ID
        if (!$data['tender']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Tender not found');
        }
        // Pass the data to the view
        return view('Master/TenderForm', $data);
    }

    public function update($id)
    {
        // Logic to update tender data by ID
        return redirect()->to('/tender')->with('success', 'Tender updated successfully!');
    }

    public function delete($id)
    {
        // Logic to delete tender data by ID
        return redirect()->to('/tender')->with('success', 'Tender deleted successfully!');
    }   
}
