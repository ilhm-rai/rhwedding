<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $useTimestamps = true;
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }


    public function getUser($type = 'id', $value = false)
    {
        if ($value == false) {
            return $this->findAll();
        } else {
            return $this->where([$type => $value])->first();
        }
    }



    // User Role
    public function getRoles($type = 'id', $value = false)
    {
        $builder = $this->db->table('auth_groups');

        if ($value == false) {
        $query = "SELECT `ag`.*, `agu`.`group_id`, COUNT(`agu`.`group_id`) AS amount
            FROM `auth_groups` AS `ag`
            LEFT JOIN `auth_groups_users` AS `agu`
            ON `ag`.`id` = `agu`.`group_id`
            GROUP BY `agu`.`group_id`
            ORDER BY `ag`.`id` ASC
        ";

            return $this->db->query($query)->getResultArray();
        } else {
            return $builder->getWhere([$type => $value])->getRowArray();
        }
    }

    public function saveRole($data)
    {
        $builder = $this->db->table('auth_groups');
        $builder->insert($data);
    }
    
    public function deleteRole($id)
    {
        $builder = $this->db->table('auth_groups');
        $builder->delete(['id' => $id]);
    }
    
}
