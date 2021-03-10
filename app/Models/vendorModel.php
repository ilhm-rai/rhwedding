<?php

namespace App\Models;

use CodeIgniter\Model;

class VendorModel extends Model
{
    protected $table = 'vendors';
    protected $useTimestamps = true;
    protected $db;


    public function getVendor()
    {
            $query = "SELECT `v`.*, `s`.`name` as `service_name`, `up`.`full_name` as `owner` 
            FROM `vendors` AS `v`
            JOIN `vendors_services` AS `vs`
            ON `vs`.`vendor_id` = `v`.`id`
            JOIN `services` AS `s`
            ON `vs`.`service_id` = `s`.`id`
            JOIN `users` AS `u`
            ON `u`.`id` = `v`.`user_id`
            JOIN `users_profile` AS `up`
            ON `u`.id = `up`.`user_id`
        "; 
        return $this->db->query($query)->getResultArray();
    }

    public function getVendorByUser($id)            
    {
        $query = "SELECT `v`.`id` AS `vendor_id` ,`v`.`vendor_name`, `v`.`vendor_logo`,`v`.`vendor_billboard`,`v`.`vendor_description`,`vl`.`name` AS `vendor_level` ,`v`.`active` AS `vendor_active`, `v`.`created_at` AS `vendor_create`
        FROM `vendors` AS `v`
        LEFT JOIN `users` AS `u`
        ON `u`.`id` = `v`.`user_id`
        JOIN `vendors_level` AS `vl`
        ON `v`.`vendor_level_id` = `vl`.`id`
        WHERE `u`.`id` = $id
        ";
        return $this->db->query($query)->getRowArray();
    }


    public function getVendorBy($id)
    {
        $query = "SELECT `v`.*, `s`.`name` as `service_name`, `up`.`full_name` as `owner` 
        FROM `vendors` AS `v`
        JOIN `vendors_services` AS `vs`
        ON `vs`.`vendor_id` = `v`.`id`
        JOIN `services` AS `s`
        ON `vs`.`service_id` = `s`.`id`
        JOIN `users` AS `u`
        ON `u`.`id` = `v`.`user_id`
        JOIN `users_profile` AS `up`
        ON `u`.id = `up`.`user_id`
        WHERE `v`.`id` = $id
        ";
        return $this->db->query($query)->getRowArray();
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
    public function getVendorsByLevel($id)
    {
        $query = "SELECT `vl`.`name` as `level`,`v`.*
            FROM `vendors_level` AS `vl`
            JOIN `vendors` AS `v`
            ON `vl`.`id` = `v`.`vendor_level_id`
            WHERE `vl`.`id` = $id
        "; 
        return $this->db->query($query)->getResultArray();
    }

}