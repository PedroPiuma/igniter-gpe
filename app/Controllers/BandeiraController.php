<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BandeiraModel;

class BandeiraController extends BaseController
{
    protected $pager;
    protected $bandeiraModel;

    public function __construct()
    {
        $this->pager = \Config\Services::pager();
        $this->bandeiraModel = new BandeiraModel;
    }

    public function index()
    {
        return view('bandeiras/index', [
            'bandeiras' => $this->bandeiraModel->paginate(10),
            'pager' => $this->pager,
        ]);
    }
}
