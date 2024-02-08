<?php

namespace App\Models;

use CodeIgniter\Model;

class PedidoModel extends Model
{
    protected $table = 'pedido'; // Substitua pelo nome real da tabela do banco de dados
    protected $primaryKey = 'id_pedido'; // Substitua pelo nome real da chave primária
    protected $returnType = 'object';
    protected $allowedFields = [
        'email_cliente',
        'nome_cliente',
        'descricao',
        'codigo_identificacao',
        'valor_total',
        'codigo_externo',
        'link_ativo',
        'tipo_pagamento',
        'payment_id',
        // Adicione outros campos conforme necessário
    ];

    protected $useTimestamps = true; // Configuração para campos de timestamp (created_at, updated_at)

    // Adicione outras configurações ou métodos conforme necessário

    public function getPedido($id)
    {
        // Retorna um pedido pelo ID
        return $this->find($id);
    }

    public function getPagination(?int $perPage = 10)
    {
        $this->builder()
            ->select('pedido.*, usuario.nome, 
                    (SELECT cstI.status_fantasia 
                        FROM pedido pI
                        LEFT JOIN evento eI ON pI.id_pedido = eI.id_pedido
                        INNER JOIN cielo_status_transacao cstI ON cstI.id_cielo_status_transacao = eI.id_cielo_status_transacao 
                        WHERE pI.id_pedido = pedido.id_pedido 		
                        ORDER BY eI.id_evento DESC 
                        LIMIT 1) as status_fantasia,
                    (SELECT pstI.status_desc
                        FROM pedido pI
                        LEFT JOIN evento eI ON pI.id_pedido = eI.id_pedido
                        INNER JOIN pagarme_status_transacao pstI ON pstI.id_pagarme_status_transacao = eI.id_pagarme_status_transacao 
                        WHERE pI.id_pedido = pedido.id_pedido 		
                        ORDER BY eI.id_evento DESC 
                        LIMIT 1) as status_desc,
                    (SELECT eI.created_at
                        FROM pedido pI
                        LEFT JOIN evento eI ON pI.id_pedido = eI.id_pedido
                        WHERE pI.id_pedido = pedido.id_pedido 		
                        ORDER BY eI.id_evento DESC 
                        LIMIT 1) as created_at,
                    (SELECT cstI.id_cielo_status_transacao 
                        FROM pedido pI
                        LEFT JOIN evento eI ON pI.id_pedido = eI.id_pedido
                        INNER JOIN cielo_status_transacao cstI ON cstI.id_cielo_status_transacao = eI.id_cielo_status_transacao 
                        WHERE pI.id_pedido = pedido.id_pedido 		
                        ORDER BY eI.id_evento desc 
                        LIMIT 1) as id_cielo_status_transacao,')
            ->join('usuario', 'pedido.id_usuario = usuario.id_usuario')
            ->orderBy('pedido.id_pedido', 'DESC');

        return $this->paginate($perPage);
    }

    public function insertPedido($data)
    {
        // Insere um novo pedido no banco de dados
        return $this->insert($data);
    }

    public function updatePedido($id, $data)
    {
        // Atualiza um pedido no banco de dados pelo ID
        return $this->update($id, $data);
    }

    public function deletePedido($id)
    {
        // Exclui um pedido do banco de dados pelo ID
        return $this->delete($id);
    }
}
