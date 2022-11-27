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
                            </div>
                            <!--begin::Form-->
                            <form class="form" action="{{ route('admin.admin.update', $admin->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4 mb-4">
                                            <label class="fw-bolder ">Image:</label><br>
                                            <!--begin::Image input-->
                                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{ asset('assets/media/avatars/blank.png') }})">
                                                <!--begin::Preview existing avatar-->
                                                @if($admin->image)
                                                <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ getFile($admin->image)  }})"></div>
                                                @else
                                                <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ asset('assets/media/avatars/blank.png') }})"></div>
                                                @endif
                                                <!--end::Preview existing avatar-->
                                                <!--begin::Label-->
                                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                    <!--begin::Inputs-->
                                                    <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                                    <input type="hidden" name="avatar_remove" />
                                                    <!--end::Inputs-->
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Cancel-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
																<i class="bi bi-x fs-2"></i>
															</span>
                                                <!--end::Cancel-->
                                                <!--begin::Remove-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
																<i class="bi bi-x fs-2"></i>
															</span>
                                                <!--end::Remove-->
                                            </div>
                                            <!--end::Image input-->
                                            <!--begin::Hint-->
                                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                            <!--end::Hint-->
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">Name</label>
                                            <input type="text" name="name" class="form-control form-control-solid"
                                                   placeholder="Enter name" value="{{ $admin->name }}" required>
                                        </div>

                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">Email</label>
                                            <div class="input-group input-group-solid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-mail-bulk"></i></span>
                                                </div>
                                                <input type="email" name="email" id="email" class="form-control form-control-solid" placeholder="Enter email" value="{{ $admin->email }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class=" fw-bolder">Password</label>
                                            <div class="input-group input-group-solid">
                                                <input type="text" name="password" class="form-control form-control-solid" placeholder="Enter password" value="{{ old('password') }}" >
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">Mobile Number</label>
                                            <div class="input-group input-group-solid">
                                                <input type="text" name="mobile_number" class="form-control form-control-solid" placeholder="Enter mobile number" value="{{ $admin->mobile_number }}" required>
                                            </div>
                                        </div>

                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">Address</label>
                                            <div class="input-group input-group-solid">
                                                <input type="text" name="address" class="form-control form-control-solid" placeholder="Enter address" value="{{ $admin->address }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">Designation</label>
                                            <div class="input-group input-group-solid">
                                                <input type="text" name="designation" class="form-control form-control-solid" placeholder="Enter designation" value="{{ $admin->designation }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">Status</label>
                                            <div class="input-group input-group-solid">
                                                <select name="status" class="form-select form-select-solid">
                                                    <option value="">--Select Option</option>
                                                    <option value="1" {{ $admin->status == 1 ? 'selected':'' }}>Active</option>
                                                    <option value="0" {{ $admin->status == 0 ? 'selected':'' }}>Disable</option>
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
