
@extends('admin.layouts.app')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body pt-0">

                        <!--begin::Card-->
                        <div class="card card-custom gutter-b example example-compact">
                            <div class="card-header">
                                <h3 class="card-title">{{ @$pageTitle }}</h3>
                            </div>
                            <!--begin::Form-->
                            <form class="form" action="{{ route('admin.event.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">Event Name</label>
                                            <input type="text" name="name" class="form-control form-control-solid"
                                                   placeholder="Enter name" value="{{ old('name') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">Event Venue</label>
                                            <input type="text" name="venue" class="form-control form-control-solid"
                                                   placeholder="Enter event venue" value="{{ old('venue') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">Fee</label>
                                            <input type="number" min="0" name="fee" class="form-control form-control-solid"
                                                   placeholder="Enter fee" value="{{ old('fee') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">Event Date</label>
                                            <input type="date" name="date" class="form-control form-control-solid"
                                                   placeholder="Enter date" value="{{ old('date') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">Registration Deadline Date</label>
                                            <input type="date" name="registration_deadline" class="form-control form-control-solid"
                                                   placeholder="Enter date" value="{{ old('registration_deadline') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">Event Type</label>
                                            <div class="input-group input-group-solid">
                                                <select name="type" class="form-select form-select-solid">
                                                    <option value="1">AGM</option>
                                                    <option value="2">Get Together</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">Status</label>
                                            <div class="input-group input-group-solid">
                                                <select name="status" class="form-select form-select-solid">
                                                    <option value="1">Active</option>
                                                    <option value="0">Disable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-12">
                                            <label class="required fw-bolder">Payment Details</label>
                                            <textarea name="payment_details" placeholder="Type bank details, mobile banking account number etc" class="form-control form-control-solid" cols="10" rows="5">{{ old('payment_details') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer " >
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Card-->

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
    </div>
@endsection
