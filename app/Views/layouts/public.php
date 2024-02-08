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
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 90vh;
            /* background-color: #f3f3f4; */
        }

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            margin: 0 auto;
            text-align: center;
            z-index: 1;
            border-top: 1px solid black;
            padding: 20px 0;
        }
    </style>
</head>

<body>
    <?php if (session()->has('error')) : ?>
        <div style="color: red; margin: 10px;">
            <?= esc(session('error')) ?>
        </div>
    <?php endif; ?>

    <main class="mb-5 pb-5">
        <?= $this->renderSection('content') ?>
    </main>

    <footer>
        Gateway de Pagamento Essentia © 2024 by Essentia Pharma. All rights reserved.
    </footer>
</body>

</html>