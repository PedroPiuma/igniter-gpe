<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    protected $returnType = 'object';
    protected $allowedFields = ['nome', 'email', 'senha', 'admin', 'id_acl_role', 'id_sistema', 'ativo', 'by_pass', 'password_expired'];

    public function findByUsernameAndPassword($username, $password): object|bool
    {
        $usuario = $this->where('email', $username)->first();

        if ($usuario && password_verify($password, $usuario->senha)) {
            return $usuario;
        }

        return false;
    }

    public function findById($id, $idSistema = null)
    {
        $builder = $this->db->table('usuario u');
        $builder->select('u.id_usuario, u.nome, u.email, u.ativo, u.id_sistema, u.admin, sis.nome as nomeSistema, aclr.nome as roleName, aclr.is_admin as isAdmin')
            ->join('acl_role aclr', 'u.id_acl_role = aclr.id_acl_role')
            ->join('sistema sis', 'u.id_sistema = sis.id_sistema')
            ->where('u.id_usuario', $id);

        if ($idSistema !== null) {
            $builder->where('u.id_sistema', $idSistema);
        }

        return $builder->get()->getRowArray();
    }

    public function findByName($name = '', $idSistema = null)
    {
        $builder = $this->db->table('usuario u')
            ->select('u.id_usuario, u.nome, u.email, u.ativo, u.id_sistema, sis.nome as nomeSistema, aclr.nome as roleName')
            ->join('acl_role aclr', 'u.id_acl_role = aclr.id_acl_role')
            ->join('sistema sis', 'u.id_sistema = sis.id_sistema')
            ->like('u.nome', $name);

        if ($idSistema) {
            $builder->where('u.id_sistema', $idSistema);
        }

        $builder->orderBy('u.nome', 'ASC');

        return $builder;
    }
}
