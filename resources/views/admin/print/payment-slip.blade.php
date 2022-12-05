<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('assets/pdf/css/style.css') }}">
    <title>Dushaa</title>
</head>
<body>
<button id="printPageButton" onClick="window.print();">Print</button>
<header class="header header-2">
    <div class="container">
        <div class="header-content">
            <h1>Dushaa</h1>
{{--            <h4>{{ getOption('app_district') }}</h4>--}}
            <h5>Payment Slip</h5>
        </div>
    </div>
</header>
<div class="city-logo money-slip-logo">
    <div class="container">
        <img src="{{ asset(getOption('app_logo')) }}" alt="logo">
    </div>
</div>

<div class="invoice-body">
    <div class="container">
        <div class="invoice-topbar">
            <div class="invoice-top-left-area">
                <h5>INVOICE TO:</h5>
                <h6 id="name">{{ $transaction->id }}</h6>
            </div>
            <div class="invoice-top-right-area">
                <h5>Date Of Invoice</h5>
                <h6><span id="date">{{ date('M d, Y', strtotime($transaction->created_at)) }}</span></h6>
            </div>
        </div>
        <table class="invoice-table">
            <tr>
                <td>#</td>
                <td>Description</td>
                <td>Member Category</td>
                <td>Member Fee</td>
                <td>Charge Fee</td>
                <td>TOTAL</td>
            </tr>
            <tr>
                <td>01</td>
                <td>{{ $transaction->purpose }}</td>
                <td>{{ @$transaction->memberCategory->name }}</td>
                <td>{{ $transaction->amount }}</td>
                <td>{{ $transaction->mobile_banking_charge_fee }}</td>
                <td>{{ $transaction->total_amount }}</td>
            </tr>
            <tr>
                <td class="total" colspan="5">Grand Total</td>
                <td>{{ $transaction->total_amount }}</td>
            </tr>
        </table>
    </div>
</div>

<div class="invoice-footer">
    <div class="container">
        <div class="invoice-footer-left-area">
            <h3>Payment Information:</h3>
            <ul>
                <li>Payment Method <span>
                    @if($transaction->payment_method == 'cash')
                            Cash
                        @elseif($transaction->payment_method == 'nagad')
                            Nagad
                        @elseif($transaction->payment_method == 'bkash')
                            Bkash
                        @elseif($transaction->payment_method == 'rocket')
                            Rocket
                        @elseif($transaction->payment_method == 'bank_draft')
                            Bank Draft
                        @endif
                    </span>
                </li>
                @if($transaction->payment_method == 'bkash' || $transaction->payment_method == 'nagad' || $transaction->payment_method == 'rocket')
                    <li>Mobile Banking Number: <b class="text-black">{{ $transaction->mobile_banking_number }}</b></li>
                    <li>Transaction ID: <b class="text-black">{{ $transaction->trx_id }}</b></li>
                @elseif($transaction->payment_method == 'cash')
                    <li>Rashid No: <b class="text-black">{{ $transaction->rashid_no }}</b></li>
                    <li>Serial No: <b class="text-black">{{ $transaction->serial_no }}</b></li>
                @endif
                <li>Total Amount # <span>{{ $transaction->total_amount }}</span> Tk</li>
                <li>Date: <span>{{ $transaction->created_at }}</span></li>
            </ul>
        </div>
        <div class="invoice-paid-seal">
            <img src="{{ asset('assets/pdf/images/paid.png') }}" alt="seal">
        </div>
    </div>
</div>

</body>
</html>
