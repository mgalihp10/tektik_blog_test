<?php

namespace App\Http\Controllers\Backend\Dashboards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware("auth", ["except" => []]);
    }

    public function index()
    {
        return view('backend.pages.dashboard.index');
    }
}
