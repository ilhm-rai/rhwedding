<?php

namespace App\Models;

use CodeIgniter\Model;

class VendorModel extends Model
{
    protected $table = 'vendors';
    protected $allowedFields = ['user_id', 'vendor_code', 'slug', 'vendor_name', 'vendor_logo', 'vendor_banner', 'vendor_billboard', 'vendor_level_id', 'vendor_description', 'contact_vendor', 'vendor_address', 'city', 'province', 'postal_code', 'active'];
    protected $useTimestamps = true;
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function getVendor()
    {
        $query = "SELECT `v`.*, `vl`.`name` as `level_name`, `up`.`full_name` as `owner`
            FROM `vendors` AS `v`
            JOIN `vendors_level` AS `vl`
            ON `v`.`vendor_level_id` = `vl`.`id`
            LEFT JOIN `users` AS `u`
            ON `u`.`id` = `v`.`user_id`
            LEFT JOIN `users_profile` AS `up`
            ON `u`.id = `up`.`user_id`
        ";
        return $this->db->query($query)->getResultArray();
    }

    public function getVendorBy($id)
    {
        $query = "SELECT `v`.`id` AS `vendor_id` ,`v`.`vendor_name`, `v`.`vendor_logo`,`v`.`vendor_billboard`,`v`.`vendor_description`,`vl`.`name` AS `vendor_level` ,`v`.`active` AS `vendor_active`, `v`.`created_at` AS `vendor_create`, `v`.`slug`
        FROM `vendors` AS `v`
        LEFT JOIN `users` AS `u`
        ON `u`.`id` = `v`.`user_id`
        JOIN `vendors_level` AS `vl`
        ON `v`.`vendor_level_id` = `vl`.`id`
        WHERE `v`.`id` = $id
        ";
        return $this->db->query($query)->getRowArray();
    }

    public function getVendorBySlug($slug)
    {
        $query = "SELECT `v`.*, `vl`.`name` AS 'level'
        FROM `vendors` AS `v`
        LEFT JOIN `users` AS `u`
        ON `u`.`id` = `v`.`user_id`
        JOIN `vendors_level` AS `vl`
        ON `v`.`vendor_level_id` = `vl`.`id`
        WHERE `v`.`slug` = '$slug'
        ";
        return $this->db->query($query)->getRowArray();
    }

    public function getVendorByUser($id)
    {
        $query = "SELECT `v`.`id` AS `vendor_id` ,`v`.`vendor_name`, `v`.`vendor_logo`,`v`.`vendor_banner` ,`v`.`vendor_billboard`,`v`.`vendor_description`,`vl`.`name` AS `vendor_level` ,`v`.`active` AS `vendor_active`, `v`.`created_at` AS `vendor_create`, `v`.`contact_vendor`, `v`.`city`, `v`.`vendor_address`,`v`.`slug`
        FROM `vendors` AS `v`
        LEFT JOIN `users` AS `u`
        ON `u`.`id` = `v`.`user_id`
        JOIN `vendors_level` AS `vl`
        ON `v`.`vendor_level_id` = `vl`.`id`
        WHERE `u`.`id` = $id
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

    // suggest search
    public function getVendorsSuggest($keyword)
    {
        $query = "SELECT vendor_name, vendor_logo, slug
            FROM `vendors` AS `v`
            WHERE `vendor_name` LIKE '$keyword%'
            LIMIT 2
        ";
        return $this->db->query($query)->getResultArray();
    }

    public function getVendorsByKeyword($keyword)
    {
        $query = "SELECT vendor_name, vendor_logo, slug
        FROM `vendors` AS `v`
        WHERE `vendor_name` LIKE '$keyword%'

    ";
        return $this->db->query($query)->getResultArray();
    }


    // make vendor code
    public function createVendorCode()
    {
        $query = "SELECT RIGHT(`vendors`.`id`,1) AS `id`
                FROM `vendors`
                ORDER BY `id` DESC
                LIMIT 1
        ";
        $result = $this->db->query($query)->getRowArray();
        // dd($result);
        if ($result > 0) {
            $uniq = $result['id']  + 1;
        }

        $date = date('Ym');
        $limit = str_pad($uniq, 3, "0", STR_PAD_LEFT);
        $code_vend = "VND" . $date . $limit;  //format kode
        return $code_vend;
    }

    public function getMyVendorId()
    {
        $this->builder = $this->db->table('vendors');
        $this->builder->select('id');
        $query = $this->builder->getWhere(['user_id' => user()->id])->getRowArray();
        return $query['id'];
    }
}
