<?php

namespace App\Models;

use CodeIgniter\Model;

class ParcelaModel extends Model
{
    protected $table            = 'parcela';
    protected $primaryKey       = 'id_parcela';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object'; // Pode ser 'array' ou 'object' dependendo de suas necessidades.
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['quantidade', 'valor_inicial', 'valor_final', 'id_bandeira', 'infinito'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'quantidade' => 'required|integer',
        'valor_inicial' => 'required|decimal',
        'valor_final' => 'required|decimal',
        'id_bandeira' => 'required|integer',
        'infinito' => 'required|integer',
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

    // Relacionamento
    protected $belongsTo = [
        'bandeira' => [
            'model' => 'BandeiraModel',
            'foreignKey' => 'id_bandeira',
        ],
    ];
}
