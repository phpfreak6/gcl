<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\LegalCase;
use App\Models\Maintenance;
use App\Models\FeeCollection;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

}
