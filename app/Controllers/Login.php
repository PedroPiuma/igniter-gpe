<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Login extends BaseController
{
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

        $usuarioModel = new UsuarioModel; // Substitua pelo nome real do seu model de usuário

        // Lógica de autenticação
        $user = $usuarioModel->findByUsernameAndPassword($username, $password);

        if ($user) {
            // Usuário autenticado com sucesso
            session()->set('user', [
                'idUsuario' => $user['id_usuario'],
                'username' => $user['email'],
            ]);

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
