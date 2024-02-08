<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdquirenteModel;

class AdquirenteController extends BaseController
{
    protected $pager;
    protected $adquirenteModel;

    public function __construct()
    {
        $this->pager = \Config\Services::pager();
        $this->adquirenteModel = new AdquirenteModel;
    }

    public function index()
    {
        return view('adquirentes/index', [
            'adquirentes' => $this->adquirenteModel->paginate(10),
            'pager' => $this->pager,
        ]);
    }
}
