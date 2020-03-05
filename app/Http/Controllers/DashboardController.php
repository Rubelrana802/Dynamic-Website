<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales\Sale;
use App\Models\Accounts\Expense;
use DB;


class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        

        return view('dashboard');
    }

}
