<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\Event;
use App\Models\Inquiry;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['pageTitle'] = 'Home';
        $data['subNavDashboardActiveCLass'] = 'active';
        $data['total_admin'] = Admin::count();
        $data['total_user'] = User::count();
        $data['total_event'] = Event::count();
        $data['ongoing_event'] = Event::where('date', '>=', date('Y-m-d'))->count();
        return view('admin.dashboard')->with($data);
    }
}
