<?php

namespace App\Models;

use CodeIgniter\Model;

class CartaoCreditoModel extends Model
{
    protected $table            = 'cartao_credito';
    protected $primaryKey       = 'id_cartao_credito';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object'; // Pode ser 'array' ou 'object' dependendo de suas necessidades.
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nome', 'descricao'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nome' => 'required|max_length[45]',
        'descricao' => 'max_length[300]',
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
        'bandeiras' => [
            'model' => 'BandeiraModel',
            'foreignKey' => 'id_cartao_credito',
        ],
    ];
}
