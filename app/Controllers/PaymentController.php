<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PaymentController extends BaseController
{
    public function gerarArquivoConciliacaoPixAction()
    {
        return view('payment-reports');
    }

    public function createPix()
    {
        return view('payment/create-pix');
    }
}
