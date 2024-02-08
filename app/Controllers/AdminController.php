<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PedidoModel;

class AdminController extends BaseController
{
    protected $pager;
    protected $pedidoModel;

    public function __construct()
    {
        $this->pager = \Config\Services::pager();
        $this->pedidoModel = new PedidoModel;
    }

    public function index()
    {
        $searchParam = $this->request->getGet('search-param');

        if (user()->isAdmin) {
            $idUsuario = user()->id_usuario;
            $this->pedidoModel->where("pedido.id_usuario = {$idUsuario}");
        }

        if (!user()->isAdmin && !$searchParam) {
            $idSistema = user()->id_sistema;
            $this->pedidoModel->where("pedido.id_sistema = {$idSistema}");
        }

        if ($searchParam) {
            $this->pedidoModel->where("CONCAT(pedido.nome_cliente, pedido.codigo_identificacao, pedido.codigo_externo, pedido.valor_total) LIKE '%{$searchParam}%'");
        }

        return view('dashboard', [
            'pedidos' =>  $this->pedidoModel->getPagination(),
            'pager' => $this->pager,
        ]);
    }
}
