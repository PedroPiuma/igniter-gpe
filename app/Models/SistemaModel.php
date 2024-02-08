<?php

namespace App\Models;

use CodeIgniter\Model;

class SistemaModel extends Model
{
    protected $table            = 'sistema';
    protected $primaryKey       = 'id_sistema';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nome', 'sigla', 'merchant_id', 'merchant_key', 'pagarme_api_key',
        'cedente_endereco', 'cedente_nome_empresa', 'cedente_texto_demonstrativo',
        'dias_expiracao_boletos', 'cedente_documento_identificacao', 'cedente_instrucoes_boleto'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';


    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
