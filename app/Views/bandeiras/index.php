<?= $this->extend('layouts/default'); ?>

<?= $this->section('content') ?>
<style>
    ul.pagination li {
        margin-right: 5px;
    }

    ul.pagination li a,
    ul.pagination li.active a {
        text-decoration: none;
        padding: 8px 12px;
        background-color: #141414;
        color: #fff;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    ul.pagination li.active a {
        background-color: #c49f51;
    }

    ul.pagination li.active a:hover {
        background-color: #665738;
    }
</style>

<h1 class="my-4">Bandeiras</h1>

<?= $pager->links() ?>

<table class="table table-striped">
    <thead>
        <tr>
            <td>ID</td>
            <td>Bandeira</td>
            <td>Habilitado</td>
            <td>Ações</td>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($bandeiras as $bandeira) : ?>

            <tr>
                <td><?= $bandeira->id_bandeira  ?></td>
                <td><?= $bandeira->nome ?></td>

                <td id="status_sistema_adquirente_1">
                    <a href="#" class="btn btn-secondary" title="Desabilitar">
                        <i class="fa-solid fa-check"></i>
                    </a>
                </td>

                <td>
                    <a href="#" class="btn btn-primary" title="Editar">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </td>
            </tr>

        <?php endforeach ?>

    </tbody>
</table>

<?= $this->endSection() ?>