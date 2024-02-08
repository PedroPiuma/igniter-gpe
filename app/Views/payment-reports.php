<?= $this->extend('layouts/default'); ?>

<?= $this->section('content') ?>

<style>
    #transacoes-pix,
    #transacoes-cartao {
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
    <h1>Relatórios</h1>

    <div class="d-flex">

        <form id="transacoes-pix" method="post" action="#" class="px-3 py-3 mt-3 mx-2">
            <h4 class="mb-3">Transações por PIX</h4>

            <div class="input-group mb-3">
                <label class="input-group-text" for="filtro">Filtro</label>
                <select class="form-select" id="filtro" name="filtro" required>
                    <option selected>Escolha o filtro...</option>
                    <option value="dataPedido">Data do pedido</option>
                    <option value="dataTransacao">Data do pagamento</option>
                    <option value="conciliacao">Arquivo de conciliação ERP-PIX</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="id_sistema">Sistema</label>
                <select class="form-select" id="id_sistema" name="id_sistema" required>
                    <option selected>Selecione um sistema...</option>
                    <option value="1">Supermonitor HKM</option>
                    <option value="2">Supermonitor SMART</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Data início</span>
                <input type="date" class="form-control" name="dateInit" id="dateInit">
            </div>

            <div class="input-group date mb-3">
                <span class="input-group-text">Data fim</span>
                <input type="date" class="form-control" name="dateEnd" id="dateEnd">
            </div>

            <button class="btn btn-primary" type="submit"> Gerar relatório </button>

        </form>

        <form id="transacoes-cartao" method="post" action="#" class="px-3 py-3 mt-3 mx-2">
            <h4 class="mb-3">Transações por Cartão de Crédito</h4>

            <div class="input-group mb-3">
                <label class="input-group-text" for="id_sistema">Sistema</label>
                <select class="form-select" id="id_sistema" name="id_sistema" required>
                    <option selected>Selecione um sistema...</option>
                    <option value="1">Supermonitor HKM</option>
                    <option value="2">Supermonitor SMART</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Data início</span>
                <input type="date" class="form-control" name="dateInitCard" id="dateInitCard">
            </div>

            <div class="input-group date mb-3">
                <span class="input-group-text">Data fim</span>
                <input type="date" class="form-control" name="dateEndCard" id="dateEndCard">
            </div>

            <button class="btn btn-primary" type="submit"> Gerar relatório </button>

        </form>

    </div>
</div>

<?= $this->endSection() ?>