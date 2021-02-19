<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $useTimestamps = true;
    
    public function getUser($type = 'id', $value = false)
    {
        if ($value == false) {
            return $this->findAll();
        } else {
            return $this->where([$type => $value])->first();
        }
    }


    public function getPermissions($type = 'id', $value = false)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->table('auth_groups');

        if ($value == false) {
        $query = "SELECT `auth_groups`.*, `group_id`, COUNT(`group_id`) AS amount
            FROM `auth_groups_users`
            JOIN `auth_groups`
            ON `group_id` = `id`
            GROUP BY `group_id`
        ";

            return $this->db->query($query)->getResultArray();
        } else {
            // return $this->where([$type => $value])->first();
        }
    }
    
}
