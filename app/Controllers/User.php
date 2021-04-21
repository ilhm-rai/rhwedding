<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProfileModel;
use App\Models\UsersModel;
use App\Models\VendorModel;

class User extends BaseController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;
    protected $usersModel;
    protected $vendorModel;
    protected $profileModel;
    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->vendorModel = new VendorModel();
        $this->profileModel = new ProfileModel();
    }

    public function profile($id)
    {
        $data = [
            'title'  => 'Profile | RH Wedding Planner',
            'user'  => $this->usersModel->getUserBy($id),
        ];

        return view('user/profile/index', $data);
    }
    public function vendor($id)
    {
        $data = [
            'title'  => 'Profile | RH Wedding Planner',
            'user'  => $this->usersModel->getUserBy($id),
            'vendor'  => $this->vendorModel->getVendorByUser($id),
        ];
        // dd($data['vendor']);
        return view('user/profile/vendor', $data);
    }

    public function editAddress()
    {
        $this->profileModel->updateAddress($this->request->getVar('address'));
        return redirect()->to('/checkout');
    }
}
