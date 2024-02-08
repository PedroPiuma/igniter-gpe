<?= $this->extend('layouts/default'); ?>

<?= $this->section('content') ?>

<style>
    #usuarios-criar {
        background-color: #333;
        color: #f5f5f5;
        border-radius: 8px;
    }

    form {
        max-width: 600px;
        margin: 0 auto;
    }
</style>

<div class="d-flex flex-column align-items-center mt-3">
    <h1>Cadastrar usuário</h1>
    <form id="usuarios-criar" method="post" action="#" class="px-3 py-5 mt-3 mx-2">

        <div class="mb-3">
            <label for="nome_usuario" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome_usuario" placeholder="nome@exemplo.com">
        </div>

        <div class="mb-3">
            <label for="email_usuario" class="form-label">Usuário (e-mail)</label>
            <input type="email" class="form-control" id="email_usuario" placeholder="name@example.com">
        </div>

        <div class="mb-3">
            <label for="senha_usuario" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha_usuario" placeholder="">
        </div>

        <div class="mb-3">
            <label for="repete_senha_usuario" class="form-label">Repita a senha</label>
            <input type="password" class="form-control" id="repete_senha_usuario" placeholder="">
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text" for="perfil_usuario">Perfil</label>
            <select class="form-select" id="perfil_usuario" name="perfil_usuario">
                <option selected>Selecione...</option>
                <option value="1">Gerente</option>
                <option value="2">Operador</option>
                <option value="3">Analista</option>
            </select>
        </div>

        <div class="input-group mb-3">
            <input type="hidden" name="sistema_usuario" value="<?= (user()->id_sistema) ?>">
            <label class="input-group-text" for="sistema_usuario">Sistema</label>
            <select class="form-select" id="sistema_usuario" name="sistema_usuario">
                <option selected>Selecione...</option>

                <?php foreach ($sistema_collection as $sistema) : ?>
                    <option value="<?= $sistema->id_sistema ?>" selected="<?= $sistema_selected == $sistema->id_sistema ? 'selected' : '' ?>">
                        <?= $sistema->nome ?> (<?= $sistema->sigla ?>)
                    </option>
                <? endforeach; ?>

            </select>
        </div>

        <button class="btn btn-primary" type="submit"> Salvar </button>

    </form>
</div>

<?= $this->endSection() ?>