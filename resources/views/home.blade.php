@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="col-md-12 mt-5">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Invoice Date</th>
                                <th>Invoice Number</th>
                                <th>Customer</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($invoices as $invoice)
                                    <tr>
                                        <td>{{$invoice->invoice_number}}</td>
                                        <td>{{$invoice->invoice_date}}</td>
                                        <td>{{$invoice->customer->name}}</td>
                                        <td>{{number_format($invoice->total_amount, 2)}}</td>
                                        <td>
                                            <a href="{{route('invoices.show', $invoice)}}" class="btn btn-sm btn-primary">View invoice</a>
                                            <a href="{{route('invoices.download', $invoice)}}" class="btn btn-sm btn-primary">Download</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
