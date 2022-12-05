@extends('frontend.layouts.app')

@section('content')
    <div class="ptb-70">
        <div class="container">
            <div class="row">
                @include('frontend.user.sidebar')
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="page-content-wrapper">
                        <div class="page-content-header">
                            <h3>Payment Now</h3>
                            <p>If you want to be a member, payment now from here</p>
                        </div>
                        <form action="{{ route('user.request-member.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="page-content mt-30">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <div class="input-groups">
                                            <label>Payment Method</label>
                                            <select name="payment_method" class="form-select payment_method" aria-label="Default select example" required>
                                                <option value="">Select Option</option>
                                                <option value="bank_draft">Bank Draft</option>
                                                <option value="bkash">Bkash</option>
                                                <option value="rocket">Rocket</option>
                                                <option value="nagad">Nagad</option>
                                                <option value="cash">Cash</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5>Payment Details</h5>
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <div class="bankDraftDiv d-none">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="input-groups">
                                                        <label for="">Bank Draft No</label>
                                                        <input type="text" class="form-control bank_draft_no" name="bank_draft_no" value=""
                                                               placeholder="Bank Draft No">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="input-groups">
                                                        <label for="">Bank Name</label>
                                                        <input type="text" class="form-control bank_name" name="bank_name" value="" placeholder="Bank Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="input-groups">
                                                        <label for="">Branch Name</label>
                                                        <input type="text" class="form-control branch_name" name="branch_name" value="" placeholder="Branch Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="input-groups">
                                                        <label for="upload_image">Bank Slip</label>
                                                        <input type="file" accept="image/*" class="form-control bank_slip" name="bank_slip" value="Bank Slip"
                                                               placeholder="Bank Slip">
                                                        <p>Accepted image type: jpeg, jpg, png</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mobileBankingDiv d-none">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="input-groups">
                                                        <label for="">Mobile Banking Number</label>
                                                        <input type="text" class="form-control mobile_banking_number" name="mobile_banking_number" value=""
                                                               placeholder="Mobile Banking Number">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="input-groups">
                                                        <label for="">Transaction No</label>
                                                        <input type="text" class="form-control trx_id" name="trx_id" value="" placeholder="Transaction No">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cashDiv d-none">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="input-groups">
                                                        <label for="">Rashid No</label>
                                                        <input type="text" class="form-control rashid_no" name="rashid_no" value="" placeholder="Rashid No">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="input-groups">
                                                        <label for="">Serial No</label>
                                                        <input type="text" class="form-control serial_no" name="serial_no" value="" placeholder="Serial No">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="input-groups">
                                                        <label for="permanent_address">Member Category</label>
                                                        <select name="member_category_id" class="form-select member_category_id" aria-label="Default select example" required>
                                                            <option value="">Select Option</option>
                                                            @foreach($categories as $category)
                                                                <option value="{{ $category->id }}" {{ $category->id == $user->member_category_id ? 'selected':'' }}>{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="input-groups">
                                                        <label for="">Member Fee</label>
                                                        <input type="number" step="any" min="0" class="form-control member_fee" name="amount" value="" placeholder="Member Fee" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="input-groups">
                                                        <label for="">Charge Fee</label>
                                                        <input type="number" step="any" min="0" class="form-control charge_fee" name="charge_fee" value="" placeholder="Charge Fee" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="input-groups">
                                                        <label for="">Total Fee</label>
                                                        <input type="number" step="any" min="0" class="form-control total_amount" name="total_amount" value="" placeholder="Total Fee" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <button class="default-button"><span>Update</span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('script')

    <script>
        "use strict"
        $('.payment_method').click(function () {
            var id = $('.member_category_id').val();
            memberCategory(id)
        })

        $('.member_category_id').on('change', function (){
            var id = this.value
            memberCategory(id)
        });

        function memberCategory(id)
        {
            $.ajax({
                type: "GET",
                url: "{{route('admin.get-category-member-fee')}}",
                data: {"member_category_id": member_category_id},
                datatype: "json",
                success: function (response) {
                    $('.member_category_id').val(response)
                    var payment_method = $('.payment_method').val();
                    var member_fee = response.memberCategory.member_fee
                    $('.member_fee').val(member_fee)
                    paymentMethod(payment_method, member_fee)
                }
            });
        }

        function paymentMethod(payment_method, member_fee)
        {
            $('.member_fee').val(member_fee)
            $('.charge_fee').val(0)

            if(payment_method == 'bank_draft') {
                $('.bankDraftDiv').removeClass('d-none')
                $('.bankDraftDiv').addClass('d-block')
                $('.mobileBankingDiv').addClass('d-none')
                $('.cashDiv').addClass('d-none')

                $('.bank_draft_no').attr('required', true);
                $('.bank_name').attr('required', true);
                $('.branch_name').attr('required', true);
                $('.bank_slip').attr('required', true);
                $('.mobile_banking_number').removeAttr('required');
                $('.trx_id').removeAttr('required');
                $('.rashid_no').removeAttr('required');
                $('.serial_no').removeAttr('required');

                $('.total_amount').val(member_fee)
            } else if(payment_method == 'bkash' || payment_method == 'rocket' || payment_method == 'nagad') {
                $('.mobileBankingDiv').removeClass('d-none')
                $('.mobileBankingDiv').addClass('d-block')
                $('.bankDraftDiv').addClass('d-none')
                $('.cashDiv').addClass('d-none')

                $('.mobile_banking_number').attr('required', true);
                $('.trx_id').attr('required', true);
                $('.bank_draft_no').removeAttr('required');
                $('.bank_name').removeAttr('required');
                $('.branch_name').removeAttr('required');
                $('.rashid_no').removeAttr('required');
                $('.serial_no').removeAttr('required');
                $('.bank_slip').removeAttr('required');

                var percentage_charge = parseFloat("{{ getOption('percentage_charge') }}")
                var charge_fee = parseInt(member_fee) * (percentage_charge / 100)
                var total = member_fee + charge_fee
                $('.charge_fee').val(charge_fee)
                $('.total_amount').val(total)

            } else if (payment_method == 'cash') {
                $('.cashDiv').removeClass('d-none')
                $('.cashDiv').addClass('d-block')
                $('.bankDraftDiv').addClass('d-none')
                $('.mobileBankingDiv').addClass('d-none')

                $('.rashid_no').attr('required', true);
                $('.serial_no').attr('required', true);
                $('.bank_draft_no').removeAttr('required');
                $('.bank_name').removeAttr('required');
                $('.branch_name').removeAttr('required');
                $('.mobile_banking_number').removeAttr('required');
                $('.trx_id').removeAttr('required');
                $('.bank_slip').removeAttr('required');

                var charge_fee = 0
                $('.total_amount').val(member_fee + charge_fee)
            }
        }
    </script>

@endpush
