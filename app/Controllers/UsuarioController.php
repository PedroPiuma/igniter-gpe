<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\{UsuarioModel, SistemaModel};

class UsuarioController extends BaseController
{
    protected $pager;
    protected $sistemaModel;
    protected $usuarioModel;

    public function __construct()
    {
        $this->pager = \Config\Services::pager();
        $this->sistemaModel = new SistemaModel;
        $this->usuarioModel = new UsuarioModel;
    }

    public function index()
    {
        $pesquisa = $this->request->getGet('pesquisa');
        $all = $this->request->getGet('all');

        $this->usuarioModel->select('usuario.id_usuario, usuario.nome, usuario.email, usuario.ativo, usuario.id_sistema, sis.nome as nomeSistema, aclr.nome as roleName')
            ->join('acl_role aclr', 'usuario.id_acl_role = aclr.id_acl_role')
            ->join('sistema sis', 'usuario.id_sistema = sis.id_sistema')
            ->orderBy('usuario.nome', 'ASC');

        // Verifica se é admin
        if (user()->isAdmin && $pesquisa && !$all) {
            $this->usuarioModel->where("usuario.nome LIKE '%$pesquisa%'")
                ->where('usuario.id_sistema', user()->id_sistema);
        }

        // Se a pesquisa não estiver vazia, realiza a busca por nome
        if ($pesquisa && !$all) {
            $this->usuarioModel->where("usuario.nome LIKE '%$pesquisa%'");
        }

        return view('usuarios/index', [
            'usuarios' => $this->usuarioModel->paginate(25),
            'pager' => $this->usuarioModel->pager,
        ]);
    }

    public function create()
    {
        $sistemas = $this->sistemaModel->select('id_sistema, sigla, nome')->findAll();

        if (user()->isAdmin) {
            $sistemaSelected = user()->id_sistema;
        }

        return view('usuarios/create', [
            'sistema_selected' => $sistemaSelected,
            'sistema_collection'  => $sistemas,
        ]);
    }
}
