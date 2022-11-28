
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
                            <form class="form" action="{{ route('admin.setting.featured-video.update', $video->id) }}" method="post">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">Youtube Video ID</label>
                                            <input type="text" name="video" class="form-control form-control-solid"
                                                   placeholder="Enter youtube video ID" value="{{ $video->video }}" required>
                                        </div>

                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">Title</label>
                                            <input type="text" name="title" class="form-control form-control-solid"
                                                   placeholder="Enter title" value="{{ $video->title }}" required>
                                        </div>

                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">Status</label>
                                            <div class="input-group input-group-solid">
                                                <select name="status" class="form-select form-select-solid">
                                                    <option value="1" {{ $video->status == 1 ? 'selected':'' }}>Active</option>
                                                    <option value="0" {{ $video->status != 1 ? 'selected':'' }}>Disable</option>
                                                </select>
                                            </div>
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
