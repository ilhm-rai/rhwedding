<?php

namespace App\Models;

use CodeIgniter\Model;

class VendorModel extends Model
{
    protected $table = 'vendors';
    protected $useTimestamps = true;
    protected $db;


    public function getVendorBy($id)
    {
        $query = "SELECT `u`.`id`,`u`.`username`,`u`.`email`,`u`.`active`,`ag`.`name` as `role_name`, `up`.`full_name`, `up`.`user_image`, `up`.`contact`, `up`.`address`, `up`.`city`, `up`.`province`, `up`.`postal_code`, `v`.`id` AS `vendor_id` ,`v`.`vendor_name`, `v`.`vendor_logo`,`v`.`vendor_billboard`,`v`.`vendor_description`,`vl`.`name` AS `vendor_level` ,`v`.`active` AS `vendor_active`, `v`.`created_at` AS `vendor_create`
        FROM `users` AS `u`
        JOIN `users_profile` AS `up`
        ON `u`.id = `up`.`user_id`
        JOIN `auth_groups_users` AS `agu`
        ON `agu`.`user_id` = `u`.`id`
        JOIN `auth_groups` AS `ag`
        ON `ag`.`id` = `agu`.`group_id`
        LEFT JOIN `vendors` AS `v`
        ON `u`.`id` = `v`.`user_id`
        JOIN `vendors_level` AS `vl`
        ON `v`.`vendor_level_id` = `vl`.`id`
        WHERE `v`.`id` = $id
        ";
        return $this->db->query($query)->getRowArray();
    }


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