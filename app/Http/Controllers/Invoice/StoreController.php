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
        $customer = Customer::create($request->customer);
        $invoice = Invoice::create($request->invoice + ['customer_id' => $customer->id]);

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

        for($i = 0; $i < count($request->customer_fields);$i++){
            if(isset($request->customer_fields[$i]['field_key']) && isset($request->customer_fields[$i]['field_value'])) {
                CustomerField::create([
                    'customer_id' => $customer->id,
                    'field_key' => $request->customer_fields[$i]['field_key'],
                    'field_value' => $request->customer_fields[$i]['field_value'],
                ]);
            }
        }

        return response([],201);
    }
}
