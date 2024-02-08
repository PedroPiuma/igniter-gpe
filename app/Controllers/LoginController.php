<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class LoginController extends BaseController
{
    protected $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel;
    }

    public function index(): string
    {
        return view('login');
    }

    public function processLogin()
    {
        $validationRules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            // Lógica para lidar com falhas de validação
            return redirect()->route('login')->withInput()->with('errors', $this->validator->getErrors());
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Lógica de autenticação
        $user = $this->usuarioModel->findByUsernameAndPassword($username, $password);

        if ($user) {
            // Usuário autenticado com sucesso
            session()->set('user', $this->usuarioModel->findById($user->id_usuario));

            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->with('error', 'Credenciais inválidas');
        }
    }

    public function logout()
    {
        session()->remove('user');

        return redirect()->route('login');
    }
}
