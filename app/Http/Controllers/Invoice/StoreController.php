<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustomerField;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;


class StoreController extends Controller
{
    public function __invoke(Request $request)
    {

        $invoice = Invoice::create($request->invoice);

        for($i = 0; $i < count($request->product);$i++){
            if(isset($request->qty[$i]) && isset($request->price[$i])) {
                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'name' => $request->product[$i],
                    'quantity' => $request->qty[$i],
                    'price' => $request->price[$i],
                ]);
            }
        }
        return redirect()->route('invoices.index');
    }
}
