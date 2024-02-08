<?php

namespace App\Models;

use CodeIgniter\Model;

class BandeiraModel extends Model
{
    protected $table            = 'bandeira';
    protected $primaryKey       = 'id_bandeira';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object'; // Pode ser 'array' ou 'object' dependendo de suas necessidades.
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nome', 'sigla', 'descricao', 'id_cartao_credito'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nome' => 'required',
        'sigla' => 'required',
        'descricao' => 'required',
        'id_cartao_credito' => 'required|integer',
    ];
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

    // Relacionamentos
    protected $hasMany = [
        'configSistemaParcelasBandeira' => [
            'model' => 'ConfigSistemaParcelasBandeiraModel',
            'foreignKey' => 'id_bandeira',
        ],
        'parcelas' => [
            'model' => 'ParcelaModel',
            'foreignKey' => 'id_bandeira',
        ],
    ];

    protected $belongsTo = [
        'cartaoCredito' => [
            'model' => 'CartaoCreditoModel',
            'foreignKey' => 'id_cartao_credito',
        ],
    ];
}
