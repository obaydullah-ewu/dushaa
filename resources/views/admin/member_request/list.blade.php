@extends('admin.layouts.app')

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <form action="" method="get">
                                <!--begin::Search-->
                                <div class="d-flex justify-content-between">
                                    <div class="form-group me-2">
                                        <select name="search_field" class="form-select form-select-solid">
                                            <option value="">--Select Status</option>
                                            <option value="3" {{ app('request')->search_field == 3 ? 'selected':'' }}>Pending</option>
                                            <option value="1" {{ app('request')->search_field == 1 ? 'selected':'' }}>Paid</option>
                                            <option value="2" {{ app('request')->search_field == 2 ? 'selected':'' }}>Cancelled</option>
                                        </select>
                                    </div>
                                    <div class="d-flex align-items-center position-relative mr-2">
                                        <button type="submit" class="btn btn-primary ms-2"><i class="fas fa-search"></i>Search
                                        </button>
                                    </div>
                                </div>
                                <!--end::Search-->
                            </form>
                        </div>
                        <!--begin::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                            <!--begin::Table head-->
                            <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        #
                                    </div>
                                </th>
                                <th class="min-w-100px">Member</th>
                                <th class="min-w-100px">Payment Method</th>
                                <th class="min-w-100px">Amount Details</th>
                                <th class="min-w-100px">Purpose</th>
                                <th class="min-w-100px">Status</th>
                                <th class="min-w-100px">Action</th>
                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">

                            @forelse($transactions as $transaction)
                                <!--begin::Table row-->
                                <tr class="ms-2">
                                    <!--begin::Checkbox-->
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            {{ $loop->iteration }}
                                        </div>
                                    </td>
                                    <!--end::Checkbox-->
                                    <td>Name: <span class="text-gray-800"><a href="{{ route('admin.request-member.member-details', $transaction->user_id) }}">{{ @$transaction->user->name }}</a> </span></td>
                                    <td>
                                        <span class="badge bg-success">{{ ucwords($transaction->payment_method) }}</span>
                                        <br>
                                        @if($transaction->payment_method == 'bkash' || $transaction->payment_method == 'nagad' || $transaction->payment_method == 'rocket')
                                            Mobile Banking No: <b class="text-black">{{ $transaction->mobile_banking_number }}</b><br>
                                            Transaction No: <b class="text-black">{{ $transaction->trx_id }}</b><br>
                                        @elseif($transaction->payment_method == 'cash')
                                            Rashid No: <b class="text-black">{{ $transaction->rashid_no }}</b><br>
                                            Serial No: <b class="text-black">{{ $transaction->serial_no }}</b><br>
                                        @endif
                                        Date: <b
                                            class="text-black">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaction->created_at)->format('d M, Y') }}</b><br>
                                        @if($transaction->payment_method == 'bank_draft')
                                            <a href="{{ getFile($transaction->bank_slip) }}" class="badge bg-primary">Click for Bank Slip</a>
                                        @endif
                                    </td>

                                    <td>
                                        Amount: <span class="text-gray-800">{{ $transaction->amount }} Tk</span><br>
                                        Charge Fee: <span class="text-gray-800">{{ $transaction->charge_fee }} Tk</span><br>
                                        Total Amount: <span class="text-gray-800">{{ $transaction->total_amount }} Tk</span>
                                    </td>
                                    <td><span class="text-gray-800">{{ $transaction->purpose }}</span></td>
                                    <td class="">
                                        <div class="d-flex">
                                            <div>
                                                @if($transaction->status == 1)
                                                    <span class="btn badge bg-success fs-8 fw-bold my-2">Approved</span>
                                                @elseif($transaction->status == 2)
                                                    <span class="btn badge bg-danger fs-8 fw-bold my-2">Cancelled</span>
                                                @else
                                                    <span class="btn badge bg-info fs-8 fw-bold my-2">Pending</span>
                                                @endif
                                            </div>
                                            @if($transaction->status == 1 || $transaction->status == 2)
                                            @else
                                            <div>
                                                <ul class="action-list">
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown"
                                                           aria-expanded="false">
                                                            <i class="fa-sharp fa-solid fa-ellipsis-vertical"></i>Change Status
                                                        </a>
                                                        <span id="hidden_id" style="display: none">{{$transaction->id}}</span>
                                                        <ul class="dropdown-menu">
                                                                <li><a class="request_status dropdown-item"
                                                                       data-status="{{1}}">{{ __('Approved') }}</a>
                                                                </li>
                                                                <li><a class="request_status dropdown-item"
                                                                       data-status="{{ 2 }}">{{ __('Cancelled') }}</a>
                                                                </li>

                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <!--begin::Show-->
                                        <a href="{{ route('admin.request-member.member-details', $transaction->user_id) }}"
                                           class="btn btn-icon btn-bg-secondary me-2">
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                         fill="none">
                                                        <path
                                                            d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
                                                            fill="currentColor"></path>
                                                        <path opacity="0.3"
                                                              d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
                                                              fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                        </a>
                                        <!--end::Show-->
                                    </td>
                                    <!--end::Action=-->
                                </tr>
                                <!--end::Table row-->
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">NO RECORD FOUND</td>
                                </tr>
                            @endforelse

                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->

                        {{ $transactions->links('pagination::bootstrap-4') }}

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection

@push('script')
    <script>
        $(".request_status").click(function () {
            var id = $(this).closest('tr').find('#hidden_id').html();
            var status = $(this).data('status');
            Swal.fire({
                title: "Are you sure to change status?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, Change it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        type: "POST",
                        url: "{{route('admin.request-member.changeStatus')}}",
                        data: {"status": status, "id": id, "_token": "{{ csrf_token() }}",},
                        datatype: "json",
                        success: function (response) {
                            if(response.status == 500) {
                                toastr.warning('', 'Something went wrong!')
                            } else if(response.status == 200) {
                                toastr.success('', "{{ __('Status has been updated') }}");
                            }
                            setTimeout(() => {
                                location.reload()
                            }, 1000);
                        },
                        error: function () {
                            alert("Error!");
                        },
                    });
                } else if (result.dismiss === "cancel") {
                }
            });
        });
    </script>
@endpush
