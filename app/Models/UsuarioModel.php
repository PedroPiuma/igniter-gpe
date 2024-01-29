<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = ['nome', 'email', 'senha', 'admin', 'id_acl_role', 'id_sistema', 'ativo', 'by_pass', 'password_expired'];

    public function findByUsernameAndPassword($username, $password): array|bool
    {
        $usuario = $this->where('email', $username)->first();

        if ($usuario && password_verify($password, $usuario['senha'])) {
            return $usuario;
        }

        return false;
    }

    public function findByName($name, $idSistema = null)
    {
        $builder = $this->db->table('usuario u');
        $builder->select('u.id_usuario, u.nome, u.email, u.ativo, u.id_sistema, sis.nome as nomeSistema, aclr.nome as roleName');
        $builder->join('acl_role aclr', 'u.id_acl_role = aclr.id_acl_role');
        $builder->join('sistema sis', 'u.id_sistema = sis.id_sistema');
        $builder->like('u.nome', $name);

        if ($idSistema !== null) {
            $builder->where('u.id_sistema', $idSistema);
        }

        $builder->orderBy('u.nome', 'ASC');

        return $builder->get()->getResultArray();
    }
}
