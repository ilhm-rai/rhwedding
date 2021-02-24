<?php

namespace App\Models;

use CodeIgniter\Model;

class VendorModel extends Model
{
    protected $table = 'vendors';
    protected $useTimestamps = true;
    protected $db;


    public function getVendor($type = 'id', $value = false)
    {
        if ($value == false) {
            $query = "SELECT `v`.*, `s`.`name` as `service_name`, `u`.`username` as `owner` 
            FROM `vendors` AS `v`
            JOIN `vendors_services` AS `vs`
            ON `vs`.`vendor_id` = `v`.`id`
            JOIN `services` AS `s`
            ON `vs`.`service_id` = `s`.`id`
            JOIN `users` AS `u`
            ON `u`.`id` = `v`.`user_id`
        "; 
        return $this->db->query($query)->getResultArray();
        } else {
            return $this->where([$type => $value])->first();
        }
    }

    public function getVendorsByService($id)
    {
        $query = "SELECT `s`.`name` as `service_name`,`v`.*
            FROM `services` AS `s`
            JOIN `vendors_services` AS `vs`
            ON `s`.`id` = `vs`.`service_id`
            JOIN `vendors` AS `v`
            ON `vs`.`vendor_id` = `v`.`id`
            WHERE `s`.`id` = $id
        "; 
        return $this->db->query($query)->getResultArray();
    }

}