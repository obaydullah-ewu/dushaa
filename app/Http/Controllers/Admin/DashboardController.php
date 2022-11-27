<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\Inquiry;
use App\Models\Manufacturer;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['pageTitle'] = 'Home';
        $data['subNavDashboardActiveCLass'] = 'active';
        return view('admin.dashboard')->with($data);
    }
}
