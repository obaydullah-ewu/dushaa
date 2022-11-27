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
                                <h3 class="card-title">Edit Admin</h3>
                                <div class="card-toolbar">
                                    <div class="example-tools justify-content-center">
                                        <span class="example-toggle" data-toggle="tooltip" title=""
                                              data-original-title="View code"></span>
                                        <span class="example-copy" data-toggle="tooltip" title=""
                                              data-original-title="Copy code"></span>
                                    </div>
                                </div>
                            </div>
                            <!--begin::Form-->
                            <form class="form" action="{{ route('admin.change-password.update', $admin->id) }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">New Password</label>
                                            <div class="input-group input-group-solid">
                                                <input type="password" name="password" class="form-control form-control-solid" placeholder="Enter password" value="" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer " >
                                    <button type="submit" class="btn btn-primary mr-2">Update</button>
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
