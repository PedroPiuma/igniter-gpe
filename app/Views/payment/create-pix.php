<?= $this->extend('layouts/default'); ?>

<?= $this->section('content') ?>

<style>
    #criar-pix-avulso {
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

    <form id="criar-pix-avulso" method="post" action="#" class="px-3 py-3 mt-3 mx-2 w-100">
        <h4 class="mb-3">Novo pedido avulso</h4>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="id_sistema" id="id_sistema_smart" value="2">
            <label class="form-check-label" for="id_sistema_smart">
                SMART
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="id_sistema" id="id_sistema_hkm" value="1" checked>
            <label class="form-check-label" for="id_sistema_hkm">
                HKM
            </label>
        </div>

        <div class="mb-3">
            <label for="valor" class="form-label">Valor*</label>
            <input type="number" class="form-control" id="valor" name="valor" required>
        </div>

        <div class="mb-3">
            <label for="nome_cliente" class="form-label">Nome cliente*</label>
            <input type="text" class="form-control" name="nome_cliente" id="nome_cliente" required>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Código cliente</label>
            <input type="text" class="form-control" name="numero_cliente" id="numero_cliente">
        </div>

        <div class="mb-3">
            <label for="cupom_fiscal" class="form-label">Cupom fiscal:</label>
            <input type="text" class="form-control" name="cupom_fiscal" id="cupom_fiscal">
        </div>

        <div class="mb-3">
            <label for="titulo" class="form-label">Título: </label>
            <input type="text" class="form-control" name="titulo" id="titulo">
        </div>

        <div class="mb-3">
            <label for="orcamento" class="form-label">Orçamento: </label>
            <input type="text" class="form-control" name="orcamento" id="orcamento">
        </div>

        <div class="mb-3">
            <label for="filial" class="form-label">Filial: </label>
            <input type="text" class="form-control" name="filial" id="filial">
        </div>

        <button class="btn btn-primary" type="submit"> Cadastrar </button>

    </form>

</div>

<?= $this->endSection() ?>