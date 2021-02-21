<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $useTimestamps = true;
    protected $db;


    public function getUser($type = 'id', $value = false)
    {
        if ($value == false) {
            $query = "SELECT `ag`.`name` as `role_name`,`u`.`id`,`u`.`username`,`u`.`email`,`u`.`active`
            FROM `auth_groups` AS `ag`
            JOIN `auth_groups_users` AS `agu`
            ON `ag`.`id` = `agu`.`group_id`
            JOIN `users` AS `u`
            ON `agu`.`user_id` = `u`.`id`
        "; 
        return $this->db->query($query)->getResultArray();
        } else {
            return $this->where([$type => $value])->first();
        }
    }
    
    public function getUsersByRole($id)
    {
        $query = "SELECT `ag`.`name` as `role_name`,`u`.`id`,`u`.`username`,`u`.`email`,`u`.`active`
            FROM `auth_groups` AS `ag`
            JOIN `auth_groups_users` AS `agu`
            ON `ag`.`id` = `agu`.`group_id`
            JOIN `users` AS `u`
            ON `agu`.`user_id` = `u`.`id`
            WHERE `ag`.`id` = $id
        "; 
        return $this->db->query($query)->getResultArray();
    }
}
