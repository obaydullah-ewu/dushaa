@extends('frontend.layouts.app')

@section('content')
<div class="ptb-70">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-12 col-sm-12 col-12">
        <div class="sidebar-area">
          <div class="sidebar-top">
            <img src="
                @if($user->image)
                    {{ getFile($user->image) }}
                @else
                    {{ asset('/') }}assets/frontend/images/user-img.jpg
                @endif
                    " alt="images">
            <h3>{{ \Illuminate\Support\Facades\Auth::user()->name }}</h3>
            <p>Web Developer</p>
          </div>
          <div class="sidebar-links">
            <ul>
              <li><a href="{{ route('user.my-profile') }}" class="active"><span><iconify-icon icon="mdi:user"></iconify-icon></span> <span>My Profile</span></a></li>
              <li><a href="#"><span><iconify-icon icon="mdi:file-transfer-outline"></iconify-icon></span> <span>Transaction History</span></a></li>
              <li><a href="{{ route('user.logout') }}"><span><iconify-icon icon="fe:logout"></iconify-icon></span> <span>Log Out</span></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-8 col-md-12 col-sm-12 col-12">
        <div class="page-content-wrapper">
          <div class="page-content-header">
            <h3>Personal Information</h3>
            <p>Setup your personal information</p>
          </div>
          <div class="page-content mt-30">
            <form action="{{ route('user.profile-update') }}" method="post" enctype="multipart/form-data">
                @csrf
              <div class="row">
                <div class="col-md-6 col-sm-6 col-12">
                  <div class="input-groups">
                    <label for="Fname">Full Name</label>
                    <input type="text" class="form-control" id="Fname" name="name" value="{{ $user->name }}" placeholder="Full Name" required>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                  <div class="input-groups">
                    <label for="Nname">Nick Name</label>
                    <input type="text" class="form-control" id="Nname" name="nick_name" value="{{ $user->nick_name }}" placeholder="Nick Name" required>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                  <div class="input-groups">
                    <label for="mobile_name">Mobile Number</label>
                    <input type="tel" class="form-control" id="mobile_number" name="mobile_number" value="{{ $user->mobile_number }}" placeholder="Mobile" required>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                  <div class="input-groups">
                    <label for="email">Email</label>
                    <input type="email" class="form-control"  name="email" value="{{ $user->email }}" placeholder="Your Email" required>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                  <div class="input-groups">
                    <label>1st year Admission Session</label>
                      <input type="text" class="form-control" name="session_year" value="{{ $user->session_year }}" placeholder="ex: 2014-15" required>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                  <div class="input-groups">
                    <label>Department</label>
                    <select name="department_id" class="form-select" aria-label="Default select example" required>
                      <option value="">Select Option</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}" {{ $department->id == $user->department_id ? 'selected':'' }}>{{ $department->name }}</option>
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
                            <option value="{{ $profession->id }}" {{ $profession->id == $user->profession_id ? 'selected':'' }}>{{ $profession->name }}</option>
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
                            <option value="{{ $designation->id }}" {{ $designation->id == $user->designation_id ? 'selected':'' }}>{{ $designation->name }}</option>
                        @endforeach

                    </select>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                  <div class="input-groups">
                    <label for="office_address">Office Address</label>
                    <input type="text" class="form-control" id="office_address" name="office_address" value="{{ $user->office_address }}" placeholder="Office Address">
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                  <div class="input-groups">
                    <label for="present_address">Present Address</label>
                    <input type="text" class="form-control" id="present_address" name="present_address" value="{{ $user->present_address }}" placeholder="Present Address">
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                  <div class="input-groups">
                    <label for="permanent_address">Permanent Address</label>
                    <input type="text" class="form-control" id="permanent_address" name="permanent_address" value="{{ $user->permanent_address }}" placeholder="Permanent Address">
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                  <div class="input-groups">
                    <label for="permanent_address">Member Category</label>
                      <select name="member_category_id" class="form-select" aria-label="Default select example">
                          <option value="">Select Option</option>
                          @foreach($categories as $category)
                              <option value="{{ $category->id }}" {{ $category->id == $user->category_id ? 'selected':'' }}>{{ $category->name }}</option>
                          @endforeach

                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="input-groups">
                    <label for="upload_image">Upload Image</label>
                    <input type="file" accept="image/*" class="form-control" id="upload_image" name="image" value="" placeholder="Upload Image">
                  </div>
                </div>
              </div>
              <button class="default-button"><span>Update</span></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
