<?= $this->extend('layouts/public'); ?>

<?= $this->section('content') ?>

<style>
    .btn-primary {
        --bs-btn-bg: #141414;
        --bs-btn-border-color: #c49f51;
        --bs-btn-hover-bg: #c49f51;
        --bs-btn-hover-border-color: #141414;
        --bs-btn-active-bg: #665738;
        --bs-btn-active-border-color: #141414;
    }

    .form-check-input:checked {
        background-color: #c49f51;
        border-color: #141414;
    }

    [data-bs-theme="dark"] {
        --bs-link-color: #c49f51;
        --bs-link-hover-color: #ffd06e;
    }

    nav {
        display: flex;
        gap: 10px;
        border-radius: 8px;
        background-color: #333;
        color: #f5f5f5;

        strong {
            font-size: 18px;
        }
    }

    #login {
        background-color: #333;
        color: #f5f5f5;
        border-radius: 8px;
    }
</style>

<nav class="px-4 py-3 mt-5 mx-2 d-flex align-items-center">
    <img src="https://cdn.essentialnutrition.com.br/wysiwyg/ktmcore/ktmvelo/logo/ho.svg" alt="Ho Essentia" width="45">
    <strong>Gateway de Pagamentos Essentia</strong>
</nav>

<form id="login" method="POST" action="/login" class="px-3 py-5 mt-3 mx-2">
    <strong>Seja bem-vindo(a)!</strong>
    <p>Por favor, realize o login.</p>

    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email" name="username" value="renan.guzman@essentia.com.br">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Senha</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>

    <button type="submit" class="btn btn-primary">Acessar</button>
</form>

<?= $this->endSection() ?>