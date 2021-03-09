<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceModel extends Model
{
    protected $table = 'services';
    protected $allowedFields = ['name', 'icon', 'description'];
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    
    // User Role
    public function getServices()
    {
        $query = "SELECT `s`.*, COUNT(`vs`.`vendor_id`) AS amount
            FROM `services` AS `s`
            LEFT JOIN `vendors_services` AS `vs`
            ON `s`.`id` = `vs`.`service_id`
            GROUP BY `s`.`id`
            ORDER BY `s`.`id` ASC
        ";
            return $this->db->query($query)->getResultArray();
    }    

    public function getServiceByVendorId($id)
    {
        $query = "SELECT `s`.*
            FROM `vendors_services` AS `vs`
            JOIN `services` AS `s`
            ON `s`.`id` = `vs`. `service_id`
            WHERE `vs`.`vendor_id` = $id
        ";
            return $this->db->query($query)->getResultArray();
    }
}
