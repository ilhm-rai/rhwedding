<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = 'users_profile';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id', 'full_name', 'address'
    ];

    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function updateAddress($address)
    {
        $builder = $this->db->table($this->table);
        $builder->update(['address' => $address], ['user_id' => user()->id]);
    }
}
