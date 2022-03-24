<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Mpociot\VatCalculator\Facades\VatCalculator;

class CreateController extends Controller
{
    public function __invoke(Request $request)
    {
        $customer = Customer::findOrFail($request->customer_id);

        //error ...
//        $tax = VatCalculator::getTaxRateForLocation($customer->country->shortcode);
        $tax = 0.1 * 100;
        $products = Product::all();
        return view('invoices.create', compact('customer', 'tax','products'));
    }
}
