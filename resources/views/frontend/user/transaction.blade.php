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
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Payment Method</th>
                                            <th scope="col">Charge</th>
                                            <th scope="col">Total Method</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($transactions as $transaction)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $transaction->payment_method }}</td>
                                                <td>{{ $transaction->charge }}</td>
                                                <td>{{ $transaction->total_amount }}</td>
                                                <td>
                                                    @if($transaction->status == 1)
                                                        <button class="btn btn-danger">Paid</button>
                                                    @elseif($transaction->status == 2)
                                                        <button class="btn btn-danger">Cancelled</button>
                                                    @else
                                                        <button class="btn btn-info">Pending</button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">No Record Found</td>
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
