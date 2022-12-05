@extends('frontend.layouts.app')

@section('content')
    <div class="ptb-70">
        <div class="container">
            <div class="row">
                @include('frontend.user.sidebar')
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="page-content-wrapper">
                        <div class="page-content-header">
                            <h3>Transaction History</h3>
                        </div>
                        <div class="page-content mt-30">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <table class="table table-striped table-responsive">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Payment Method</th>
                                            <th scope="col">Amount Details</th>
                                            <th scope="col">Purpose</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($transactions as $transaction)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td><span class="badge bg-success">{{ ucwords($transaction->payment_method) }}</span>
                                                    <br>
                                                    @if($transaction->payment_method == 'bkash' || $transaction->payment_method == 'nagad' || $transaction->payment_method == 'rocket')
                                                        Mobile Banking No: <b class="text-black">{{ $transaction->mobile_banking_number }}</b><br>
                                                        Transaction No: <b class="text-black">{{ $transaction->trx_id }}</b><br>
                                                    @elseif($transaction->payment_method == 'cash')
                                                       Rashid No: <b class="text-black">{{ $transaction->rashid_no }}</b><br>
                                                        Serial No: <b class="text-black">{{ $transaction->serial_no }}</b><br>
                                                    @endif
                                                    Date: <b class="text-black">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaction->created_at)->format('d , Y') }}</b><br>
                                                    @if($transaction->payment_method == 'bank_draft')
                                                        <a href="{{ getFile($transaction->bank_slip) }}" class="badge bg-primary">Click for Bank Slip</a>
                                                    @endif
                                                </td>
                                                <td>Amount: <b>{{ $transaction->amount }}</b><br>
                                                    Charge Fee: <b>{{ $transaction->charge_fee }}</b><br>
                                                    Total Amount: <b>{{ $transaction->total_amount }}</b>
                                                </td>
                                                <td>{{ $transaction->purpose }}</td>
                                                <td>
                                                    @if($transaction->status == 1)
                                                        <span class="badge bg-success">Approved</span>
                                                    @elseif($transaction->status == 2)
                                                        <span class="badge bg-danger">Cancelled</span>
                                                    @else
                                                        <span class="badge bg-info">Pending</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('user.transaction-history.details', $transaction->id) }}" target="_blank"><span><iconify-icon icon="material-symbols:payments-outline"></iconify-icon></span></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No Record Found</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
