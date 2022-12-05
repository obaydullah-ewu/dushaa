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
                                        <select name="profession_id" class="form-select form-select-solid">
                                            <option value="">--Select Profession--</option>
                                            @foreach($professions as $profession)
                                                <option value="{{ $profession->id }}" {{ app('request')->profession_id == $profession->id ? 'selected' : '' }}>
                                                    {{ $profession->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group me-2">
                                        <select name="designation_id" class="form-select form-select-solid">
                                            <option value="">--Select Designation--</option>
                                            @foreach($designations as $designation)
                                                <option value="{{ $designation->id }}" {{ app('request')->designation_id == $designation->id ? 'selected' : '' }}>
                                                    {{ $designation->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group me-2">
                                        <select name="department_id" class="form-select form-select-solid">
                                            <option value="">--Select Department--</option>
                                            @foreach($departments as $department)
                                                <option value="{{ $department->id }}" {{ app('request')->department_id == $department->id ? 'selected' : '' }}>
                                                    {{ $department->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="d-flex align-items-center position-relative mr-2">
                                        <input type="search" class="form-control form-control-solid w-200px "
                                               name="search_string" id="search_string" placeholder="Search name" value="{{ app('request')->search_string }}"/>
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
                                <th class="min-w-100px">Name</th>
                                <th class="min-w-100px">Email</th>
                                <th class="min-w-100px">Mobile Number</th>
                                <th class="min-w-100px">Member Category</th>
                                <th class="min-w-100px">Action</th>
                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">

                            @forelse($users as $user)
                                <!--begin::Table row-->
                                <tr class="ms-2">
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            {{ $loop->iteration }}
                                        </div>
                                    </td>
                                    <td><span class="text-gray-800"><a href="{{ route('admin.request-member.member-details', $user->id) }}">{{ $user->name }}</a> </span></td>
                                    <td><span class="text-gray-800">{{ $user->email }}</span></td>
                                    <td><span class="text-gray-800">{{ $user->mobile_number }}</span></td>
                                    <td><span class="text-gray-800">{{ @$user->memberCategory->name }}</span></td>
                                    <td>
                                        <!--begin::Show-->
                                        <a href="{{ route('admin.request-member.member-details', $user->id) }}"
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

                        {{ $users->links('pagination::bootstrap-4') }}

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

    </script>
@endpush
