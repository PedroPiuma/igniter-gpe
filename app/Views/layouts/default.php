<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gateway de Pagamentos Essentia</title>

    <link rel="stylesheet" href="<?= base_url('fontawesome-free-6.5.1-web/css/all.min.css') ?>">
    <script defer src="<?= base_url('fontawesome-free-6.5.1-web/js/all.min.js') ?>"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

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


        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }

        body {
            min-height: 90vh;
        }

        nav.navbar {
            position: sticky;
            top: 0;
            z-index: 1;
        }

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            margin: 0 auto;
            text-align: center;
            z-index: 1;
            padding: 20px 0;
            background-color: rgba(var(--bs-tertiary-bg-rgb));
        }
    </style>
</head>

<body>
    <nav class="navbar bg-body-tertiary p-4">
        <a class="navbar-brand d-flex align-items-center gap-2" href="/dashboard">
            <img src="https://cdn.essentialnutrition.com.br/wysiwyg/ktmcore/ktmvelo/logo/ho.svg" alt="Ho Essentia" width="30">
            G.P.E.
        </a>

        <ul class="nav">

            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/users">Usuários</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/payment-reports">Relatórios</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Configurações
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/adquirentes/index">Minhas adquirentes</a></li>
                    <li><a class="dropdown-item" href="/bandeiras/index">Bandeiras</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/payment/criar-pix-avulso">Criar PIX avulso</a>
            </li>
        </ul>

        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <i class="fa-solid fa-user"></i> <?= user()->nome ?>
        </button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu de navegação</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php if (session()->has('error')) : ?>
        <div style="color: red; margin: 10px;">
            <?= esc(session('error')) ?>
        </div>
    <?php endif; ?>

    <main class="mb-5 px-5 pb-5">
        <?= $this->renderSection('content') ?>
    </main>

    <footer>
        Gateway de Pagamento Essentia © 2024 by Essentia Pharma. All rights reserved.
    </footer>
</body>

</html>