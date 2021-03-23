<?php

namespace App\Models;

use CodeIgniter\Model;

class VendorsServicesModel extends Model
{
    protected $table = 'vendors_services';
    protected $allowedFields = ['vendor_id', 'service_id'];
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
}
