<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustomerField;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $customer_fields = $request->customer_fields;
        unset($request['customer_fields']);

        $customer = Customer::create($request->all());

        for ($i = 0; $i < count($customer_fields); $i++) {
            if (isset($customer_fields[$i]['field_key']) && isset($customer_fields[$i]['field_value'])) {
                CustomerField::create([
                    'customer_id' => $customer->id,
                    'field_key' => $customer_fields[$i]['field_key'],
                    'field_value' => $customer_fields[$i]['field_value'],
                ]);
            }
        }

        return redirect()->route('customers.index');
    }
}
