<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;

class IndexController extends Controller
{
    public function __invoke()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }
}
