@extends('admin.layouts.app')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Row-->
                <div class="row g-5 g-xl-8">
                    <div class="col-xl-3">
                        <div class="card-header align-items-center border-0 mt-4">
                            <div
                                class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
                                <a href=""><span class="fs-4 fw-bold text-success d-block">Total Customer</span></a>
                                <span class="fs-2hx fw-bolder text-gray-900 counted" data-kt-countup="true"
                                      data-kt-countup-value="36899">3698</span>
                            </div>
                        </div>

                    </div>


                </div>
                <!--end::Row-->
                <div class="row g-5 g-xl-8">
                    <div class="col-md-12">
                        <div class="card-header text-center border-0 mt-4">
                            {{--                            <img alt="Logo" src="{{ asset('/') }}assets/media/logo.jpg"/>--}}
                        </div>
                    </div>

                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@endsection
