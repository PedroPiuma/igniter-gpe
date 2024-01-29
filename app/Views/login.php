<?= $this->extend('layouts/default'); ?>

<?= $this->section('content') ?>

<div class="middle-box text-center loginscreen  animated fadeInDown">
    <div>
        <div>
            <h1 class="logo-name">GPE</h1>
        </div>
        <h3>Login</h3>
        <form class="m-t" role="form" action="/login" method="POST">
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-at" aria-hidden="true"></i></span>
                <input type="email" name="username" placeholder="Usuário" class="form-control" required="required" value="renan.guzman@essentia.com.br">
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
                <input type="password" name="password" placeholder="Password" class="form-control" required="required" value="">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
        </form>

        <a href="/">Voltar para Página Principal</a>

        <p class="m-t">
            <small>Gateway Payment Essentia2024 ©</small>
        </p>
    </div>
</div>

<?= $this->endSection() ?>