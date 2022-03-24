<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function invoice_items()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function getTotalAmountAttribute()
    {
        $total_amount = 0;

        foreach ($this->invoice_items as $item)
        {
            $total_amount += $item->quantity * $item->price;
        }
        return $total_amount;
    }
}
