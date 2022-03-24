<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;


class DownloadController extends Controller
{
    public function __invoke(Invoice $invoice)
    {
        $data['invoice'] = $invoice;
        $pdf = PDF::loadView('invoices.pdf', $data);

        return $pdf->download('result.pdf');
    }
}
