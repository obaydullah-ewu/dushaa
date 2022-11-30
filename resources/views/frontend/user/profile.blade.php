@extends('frontend.layouts.app')

@section('content')
    <div class="ptb-70">
        <div class="container">
            <div class="row">
                @include('frontend.user.sidebar')
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="page-content-wrapper">
                        <div class="page-content-header">
                            <h3>Personal Information</h3>
                            <p>Setup your personal information</p>
                        </div>
                        <form action="{{ route('user.profile-update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="page-content mt-30">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="input-groups">
                                            <label for="Fname">Full Name</label>
                                            <input type="text" class="form-control" id="Fname" name="name" value="{{ $user->name }}"
                                                   placeholder="Full Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="input-groups">
                                            <label for="Nname">Nick Name</label>
                                            <input type="text" class="form-control" id="Nname" name="nick_name" value="{{ $user->nick_name }}"
                                                   placeholder="Nick Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="input-groups">
                                            <label for="mobile_name">Mobile Number</label>
                                            <input type="tel" class="form-control" id="mobile_number" name="mobile_number"
                                                   value="{{ $user->mobile_number }}" placeholder="Mobile" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="input-groups">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Your Email"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="input-groups">
                                            <label>1st year Admission Session</label>
                                            @php $last_year = date('Y') - 4 ; @endphp
                                            <select name="session_year" class="form-select" aria-label="Default select example" required>
                                                <option value="">Select Session Year</option>
                                                @for($year = 1921; $year <=  $last_year; $year++)
                                                    @php
                                                        $y = $year;
                                                        $year_next = substr($y, -2) + 1;
                                                        $session_yr = $year . '-' . $year_next;
                                                    @endphp
                                                    <option
                                                        value="{{ $session_yr }}" {{ $session_yr == $user->session_year ? 'selected':'' }}>{{ $session_yr }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="input-groups">
                                            <label>Department</label>
                                            <select name="department_id" class="form-select" aria-label="Default select example" required>
                                                <option value="">Select Option</option>
                                                @foreach($departments as $department)
                                                    <option
                                                        value="{{ $department->id }}" {{ $department->id == $user->department_id ? 'selected':'' }}>{{ $department->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="input-groups">
                                            <label>Profession</label>
                                            <select name="profession_id" class="form-select" aria-label="Default select example">
                                                <option value="">Select Option</option>
                                                @foreach($professions as $profession)
                                                    <option
                                                        value="{{ $profession->id }}" {{ $profession->id == $user->profession_id ? 'selected':'' }}>{{ $profession->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="input-groups">
                                            <label>Designation</label>
                                            <select name="designation_id" class="form-select" aria-label="Default select example">
                                                <option value="">Select Option</option>
                                                @foreach($designations as $designation)
                                                    <option
                                                        value="{{ $designation->id }}" {{ $designation->id == $user->designation_id ? 'selected':'' }}>{{ $designation->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="input-groups">
                                            <label for="office_address">Office Address</label>
                                            <input type="text" class="form-control" id="office_address" name="office_address"
                                                   value="{{ $user->office_address }}" placeholder="Office Address">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="input-groups">
                                            <label for="present_address">Present Address</label>
                                            <input type="text" class="form-control" id="present_address" name="present_address"
                                                   value="{{ $user->present_address }}" placeholder="Present Address">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="input-groups">
                                            <label for="permanent_address">Permanent Address</label>
                                            <input type="text" class="form-control" id="permanent_address" name="permanent_address"
                                                   value="{{ $user->permanent_address }}" placeholder="Permanent Address">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="input-groups">
                                            <label for="permanent_address">Member Category</label>
                                            <select name="member_category_id" class="form-select" aria-label="Default select example">
                                                <option value="">Select Option</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $category->id == $user->member_category_id ? 'selected':'' }}>{{ $category->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-groups">
                                        <label for="upload_image">Upload Image</label>
                                        <input type="file" accept="image/*" class="form-control" id="upload_image" name="image" value=""
                                               placeholder="Upload Image">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="default-button"><span>Update</span></button>
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
@push('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush
@push('script')
    <script>
        function matchStart(params, data) {
            // If there are no search terms, return all of the data
            if ($.trim(params.term) === '') {
                return data;
            }

            // Skip if there is no 'children' property
            if (typeof data.children === 'undefined') {
                return null;
            }

            // `data.children` contains the actual options that we are matching against
            var filteredChildren = [];
            $.each(data.children, function (idx, child) {
                if (child.text.toUpperCase().indexOf(params.term.toUpperCase()) == 0) {
                    filteredChildren.push(child);
                }
            });

            // If we matched any of the timezone group's children, then set the matched children on the group
            // and return the group object
            if (filteredChildren.length) {
                var modifiedData = $.extend({}, data, true);
                modifiedData.children = filteredChildren;

                // You can return modified objects from here
                // This includes matching the `children` how you want in nested data sets
                return modifiedData;
            }

            // Return `null` if the term should not be displayed
            return null;
        }

        $(".js-example-matcher-start").select2({
            matcher: matchStart
        });
    </script>
@endpush
