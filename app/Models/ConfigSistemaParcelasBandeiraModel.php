<?php

namespace App\Models;

use CodeIgniter\Model;

class ConfigSistemaParcelasBandeiraModel extends Model
{
    protected $table            = 'config_sistema_parcelas_bandeira';
    protected $primaryKey       = 'id_config_sistema_parcelas_bandeira';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object'; // Pode ser 'array' ou 'object' dependendo de suas necessidades.
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_sistema', 'id_bandeira'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'id_sistema' => 'required|integer',
        'id_bandeira' => 'required|integer',
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
    protected $belongsTo = [
        'sistema' => [
            'model' => 'SistemaModel',
            'foreignKey' => 'id_sistema',
        ],
        'bandeira' => [
            'model' => 'BandeiraModel',
            'foreignKey' => 'id_bandeira',
        ],
    ];

    protected $hasMany = [
        'parcelas' => [
            'model' => 'ParcelaModel',
            'foreignKey' => 'id_config_sistema_parcelas_bandeira',
        ],
    ];
}
