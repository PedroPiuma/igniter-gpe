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

    #pesquisa {
        max-width: 600px;
    }
</style>

<h1 class="mt-4">Usuários</h1>

<div class="d-flex justify-content-between mb-4">
    <form class="d-flex" role="search">
        <input class="form-control" id="pesquisa" name="pesquisa" type="text" placeholder="Pesquisar por nome">
        <button class="btn btn-outline-success" type="submit">Search</button>
        <button class="btn btn-secondary" type="submit" id="todos" name="all" value="1">Todos</button>
    </form>

    <a href="/users/create" class="btn btn-primary">Novo Usuário</a>
</div>

<?= $pager->links() ?>

<table class="table table-striped">
    <thead>
        <tr>
            <td>ID</td>
            <td>Nome</td>
            <td>Email/Usuário</td>
            <td>Sistema</td>
            <td>Perfil</td>
            <td>Ativo</td>
            <td>Ações</td>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($usuarios as $usuario) : ?>

            <tr>
                <td><?= $usuario->id_usuario ?></td>
                <td><?= $usuario->nome ?></td>
                <td><?= $usuario->email ?></td>
                <td><?= $usuario->nomeSistema ?></td>
                <td><?= $usuario->roleName ?></td>

                <?php if ($usuario->ativo == 1) : ?>
                    <td id="status_usuario_<?= $usuario->id_usuario ?>">
                        <a class="tooltip-top" title="Desativar">
                            <i class="fa-solid fa-check" title="ativo"></i>
                        </a>
                    </td>
                <?php else : ?>
                    <td id="status_usuario_<?= $usuario->id_usuario ?>">
                        <a class="tooltip-top" title="Ativar">
                            <i class="fa-solid fa-xmark" title="inativo"></i>
                        </a>
                    </td>
                <?php endif ?>

                <td>
                    <div class="btn-group">
                        <a href="/payment/usuario-visualizar/215/" class="btn btn-primary visualizar" title="Visualizar">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>

                        <a href="/payment/usuario-edit/215/" class="btn btn-primary visualizar" title="Editar">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </div>
                </td>
            </tr>

        <?php endforeach ?>
    </tbody>
</table>

<?= $this->endSection() ?>