<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Operation;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
        $lastdate = DB::table('operations')->latest('date_as_of')->first();

        return view('operations.index', compact('lastdate'));
    }

    public function show(Operation $operation)
    {
        $lastdate = DB::table('operations')->latest('date_as_of')->first();

        return view('operations.show', compact('operation', 'lastdate'));
    }

}
