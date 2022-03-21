<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('invoices.create');
    }
}
