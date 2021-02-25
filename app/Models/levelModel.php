<?php

namespace App\Models;

use CodeIgniter\Model;

class LevelModel extends Model
{
    protected $table = 'vendors_level';
    protected $allowedFields = ['name', 'description'];
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    
    // User Role
    public function getLevel()
    {
        $query = "SELECT `vl`.*, COUNT(`v`.`vendor_level_id`) AS amount
            FROM `vendors_level` AS `vl`
            LEFT JOIN `vendors` AS `v`
            ON `vl`.`id` = `v`.`vendor_level_id`
            GROUP BY `vl`.`id`
            ORDER BY `vl`.`id` DESC
        ";

            return $this->db->query($query)->getResultArray();
    }    
}
