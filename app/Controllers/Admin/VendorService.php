<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class VendorService extends BaseController
{
    public function show()
    {
        $data['title'] = 'Vendor Services - RH Wedding';
        return view('admin/vendors/show_vendor_service', $data);
    }
}
