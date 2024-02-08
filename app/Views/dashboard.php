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

    #search-input {
        max-width: 600px;
    }
</style>

<h1 class="mt-4">Pedidos</h1>

<form class="d-flex mb-4" role="search">
    <input class="form-control" id="search-input" name="search-param" type="search" placeholder="Busca por cód. externo, cód. identificação, nome cliente">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>

<?= $pager->links() ?>

<table class="table table-striped">
    <thead>
        <tr>
            <td>Usuário</td>
            <td>Identificação</td>
            <td>Cód. Externo</td>
            <td>Ativo/Inativo</td>
            <td>Nome Cliente</td>
            <td>Valor</td>
            <td>Status</td>
            <td>Tipo Pgto.</td>
            <td>Ações</td>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($pedidos as $pedido) : ?>

            <tr id="tr_<?= $pedido->id_pedido ?>">
                <td><?= $pedido->nome ?></td>
                <td><?= $pedido->codigo_identificacao ?></td>
                <td><?= $pedido->codigo_externo ?></td>
                <td><?= $pedido->ativo ? 'Ativo' : 'Inativo' ?></td>
                <td style="max-width: 200px"><?= $pedido->nome_cliente ?></td>
                <td style="width: 100px">R$ <?= $pedido->valor_total ?></td>

                <td id="value_status_<?= $pedido->id_pedido ?>">
                    <?php if ($pedido->status_fantasia ?? $pedido->status_desc) : ?>
                        <?= $pedido->status_fantasia ?? $pedido->status_desc ?>
                        <br>
                        <small><?= date('d/m/y H:i', strtotime($pedido->created_at)) ?></small>
                    <?php else : ?>
                        <span style="color: red">Não definido</span>
                    <?php endif; ?>
                </td>

                <td style="text-align: center;">
                    <?php
                    $tiposPagamento = [0 => 'Cartão de Crédito', 1 => 'Boleto',  2 => 'PIX',];
                    $tipoPagamento = $pedido->tipo_pagamento ?? null;
                    echo $tiposPagamento[$tipoPagamento] ?? 'Não definido';
                    ?>
                </td>

                <td>
                    <div class="btn-group">

                        <?php if ($pedido->status_fantasia == 'Capturado' || $pedido->status_desc == 'Pago') : ?>
                            <button type="button" class="btn btn-primary" class="tooltip-top" title="Imprimir Comprovante">
                                <i class="fa-solid fa-barcode"></i>
                            </button>
                        <?php elseif ($pedido->status_fantasia == 'Pagamento PIX Efetuado' || $pedido->status_fantasia == 'Devolvido') : ?> ?>
                            <button type="button" class="btn btn-primary" class="tooltip-top" title="Imprimir Comprovante" rel="<?= $pedido->id_pedido ?>">
                                <i class="fa-solid fa-barcode"></i>
                            </button>
                        <?php endif ?>

                        <?php if ($pedido->id_cielo_status_transacao == 4) : ?>
                            <button type="button" class="btn btn-primary" class="tooltip-top" title="Imprimir Comprovante" rel="<?= $pedido->id_pedido ?>">
                                <i class="fa-solid fa-barcode"></i>
                            </button>
                        <?php endif ?>

                        <button type="button" class="btn btn-primary visualizar" title="Visualizar" rel="373580">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                        <button type="button" class="btn btn-primary atualizar" title="Atualizar Status" id="btn_atualizar_373580">
                            <i class="fa-solid fa-arrows-rotate"></i>
                        </button>

                        <button type="button" class="btn btn-primary capturar" title="Reprocessar">
                            <i class="fa-solid fa-arrow-right-arrow-left"></i>
                        </button>

                        <button type="button" class="btn btn-primary devolver" id="btnDevolverValor" title="Marcar devolução">
                            <i class="fa-regular fa-circle-xmark"></i>
                        </button>
                    </div>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?= $this->endSection() ?>