<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\product;
use App\Models\category;
use App\Models\news;

class DashboardController extends Controller
{
    //

    public function index(){

        $sum = 1;
        return view('admin.dashboard.index', compact('sum'));
    }


    public function indexDri(){

        $sum = 1;
        return view('admin.dashboardDri.index', compact('sum'));
    }


}
