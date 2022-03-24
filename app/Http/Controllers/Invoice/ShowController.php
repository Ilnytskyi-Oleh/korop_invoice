<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use App\Models\Invoice;


class ShowController extends Controller
{
    public function __invoke(Invoice $invoice)
    {
        return view('invoices.show', compact('invoice'));
    }
}
