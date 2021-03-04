<?php 
namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = 'users_profile';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id' , 'full_name',
    ];
}
