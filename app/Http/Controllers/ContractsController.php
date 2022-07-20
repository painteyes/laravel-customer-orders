<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;

class ContractsController extends Controller
{
    public function index()
    {
        return view('contracts.index')->withContracts(Contract::paginate(10));
    }
}

    
