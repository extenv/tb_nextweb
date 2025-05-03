<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class TenderController extends BaseController
{
    public function index()
    {
        //
        return view('Master/Tender');
    }
}
