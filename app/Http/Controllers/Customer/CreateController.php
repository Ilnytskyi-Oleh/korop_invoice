<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Country;

class CreateController extends Controller
{
    public function __invoke()
    {
        $countries = Country::all();
        return view('customers.create', compact('countries'));
    }
}
