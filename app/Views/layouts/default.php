<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gateway de Pagamentos Essentia</title>

    <!-- Adicione estas linhas no cabeçalho do seu HTML -->
    <link rel="stylesheet" href="<?= base_url('node_modules/bootstrap/dist/css/bootstrap.min.css') ?>">
    <script src="<?= base_url('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>

</head>

<body>
    <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
        Link with href
    </a>
    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        Button with data-bs-target
    </button>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
            </div>
            <div class="dropdown mt-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    Dropdown button
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
        </div>
    </div>


    <div class="navbar-header" style="width: 100%">
        <a class="navbar-brand" href="/">
            <img src="/img/essentia-logo-medium-min.png" alt="Essentia Pharma">
        </a>

        <nav>
            <ul class="menu" style="border: none; margin-top: 10px;">
                <li><a href="/login">Login</a></li>
                <li> <a href="/logout"> Sair </a>
                </li>
            </ul>
        </nav>

    </div>

    <?php if (session()->has('error')) : ?>
        <div style="color: red; margin: 10px;">
            <?= esc(session('error')) ?>
        </div>
    <?php endif; ?>

    <?= $this->renderSection('content') ?>

    <footer>
        <hr>
        <p>Gateway de Pagamento Essentia © 2024 by Essentia Pharma. All rights reserved.</p>
    </footer>
</body>

</html>