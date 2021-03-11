<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $useTimestamps = true;
    protected $db;


    protected $allowedFields = [
        'email', 'username', 'password_hash', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash',
        'status', 'status_message', 'active', 'force_pass_reset', 'permissions', 'deleted_at',
    ];
 
    public function getUser($id = false)
    {
        if(!$id){
            $query = "SELECT `u`.`id`,`u`.`username`,`u`.`email`,`u`.`active`,`ag`.`name` as `role_name`, `up`.`full_name`, `up`.`user_image`, `up`.`contact`, `up`.`address`, `up`.`city`, `up`.`province`, `up`.`postal_code`
            FROM `users` AS `u`
            JOIN `users_profile` AS `up`
            ON `u`.id = `up`.`user_id`
            JOIN `auth_groups_users` AS `agu`
            ON `agu`.`user_id` = `u`.`id`
            JOIN `auth_groups` AS `ag`
            ON `ag`.`id` = `agu`.`group_id`
        ";
        return $this->db->query($query)->getResultArray();
        }else{
            $query = "SELECT `u`.`id`,`u`.`username`,`u`.`email`,`u`.`active`,`ag`.`name` as `role_name`, `up`.`full_name`, `up`.`user_image`, `up`.`contact`, `up`.`address`, `up`.`city`, `up`.`province`, `up`.`postal_code`
        FROM `users` AS `u`
        JOIN `users_profile` AS `up`
        ON `u`.id = `up`.`user_id`
        JOIN `auth_groups_users` AS `agu`
        ON `agu`.`user_id` = `u`.`id`
        JOIN `auth_groups` AS `ag`
        ON `ag`.`id` = `agu`.`group_id`
        WHERE `u`.`id` = $id
        ";
        }
        return $this->db->query($query)->getRowArray();
    }
    public function getUserByVendor($id)
    {
        $query = "SELECT `u`.`id`,`u`.`username`,`u`.`email`,`u`.`active`,`ag`.`name` as `role_name`, `up`.`full_name`, `up`.`user_image`, `up`.`contact`, `up`.`address`, `up`.`city`, `up`.`province`, `up`.`postal_code`
        FROM `users` AS `u`
        JOIN `users_profile` AS `up`
        ON `u`.id = `up`.`user_id`
        JOIN `auth_groups_users` AS `agu`
        ON `agu`.`user_id` = `u`.`id`
        JOIN `auth_groups` AS `ag`
        ON `ag`.`id` = `agu`.`group_id`
        JOIN `vendors` AS`v`
        ON `v`.`user_id` =`u`.`id`
        WHERE `v`.`id` = $id
        ";
        return $this->db->query($query)->getRowArray();
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
