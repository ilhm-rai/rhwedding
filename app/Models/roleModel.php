<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = 'auth_groups';
    protected $allowedFields = ['name', 'description', 'active'];
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    
    // User Role
    public function getRoles()
    {
        $query = "SELECT `ag`.*, `agu`.`group_id`, COUNT(`agu`.`group_id`) AS amount
            FROM `auth_groups` AS `ag`
            LEFT JOIN `auth_groups_users` AS `agu`
            ON `ag`.`id` = `agu`.`group_id`
            GROUP BY `ag`.`id`
            ORDER BY `ag`.`id` ASC
        ";

            return $this->db->query($query)->getResultArray();
    }    
}
