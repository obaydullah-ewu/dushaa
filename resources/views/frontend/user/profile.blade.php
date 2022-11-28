@extends('frontend.layouts.app')

@section('content')
<div class="ptb-70">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-12 col-sm-12 col-12">
        <div class="sidebar-area">
          <div class="sidebar-top">
            <img src="{{ asset('/') }}assets/frontend/images/user-img.jpg" alt="images">
            <h3>Md. Riaz Uddin Khan</h3>
            <p>Web Developer</p>
          </div>
          <div class="sidebar-links">
            <ul>
              <li><a href="profile.html" class="active"><span><iconify-icon icon="mdi:user"></iconify-icon></span> <span>User Profile</span></a></li>
              <li><a href="#"><span><iconify-icon icon="mdi:file-transfer-outline"></iconify-icon></span> <span>Transaction History</span></a></li>
              <li><a href="#"><span><iconify-icon icon="fe:logout"></iconify-icon></span> <span>Log Out</span></a></li>
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
            <form>
              <div class="row">
                <div class="col-md-6 col-sm-6 col-12">
                  <div class="input-groups">
                    <label for="Fname">Full Name</label>
                    <input type="text" class="form-control" id="Fname" name="Fname" value="" placeholder="Full Name">
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                  <div class="input-groups">
                    <label for="Nname">Nick Name</label>
                    <input type="text" class="form-control" id="Nname" name="Nname" value="" placeholder="Nick Name">
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                  <div class="input-groups">
                    <label for="mobile_name">Mobile Number</label>
                    <input type="tel" class="form-control" id="mobile_name" name="mobile_name" value="" placeholder="Mobile">
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                  <div class="input-groups">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="name" name="name" value="" placeholder="Your Email">
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                  <div class="input-groups">
                    <label>1st year Admission Session</label>
                    <select class="form-select" aria-label="Default select example">
                      <option selected>2015</option>
                      <option value="1">2014</option>
                      <option value="2">2013</option>
                      <option value="3">2012</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                  <div class="input-groups">
                    <label>Department</label>
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Bangla</option>
                      <option value="1">English</option>
                      <option value="2">Law</option>
                      <option value="3">Politics</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                  <div class="input-groups">
                    <label>Profession</label>
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Teacher</option>
                      <option value="1">Businessman</option>
                      <option value="2">Job Holder</option>
                      <option value="3">Doctor</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                  <div class="input-groups">
                    <label>Designation</label>
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Manager</option>
                      <option value="1">Officer</option>
                      <option value="2">Doctor</option>
                      <option value="3">Executive</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                  <div class="input-groups">
                    <label for="office_address">Office Address</label>
                    <input type="text" class="form-control" id="office_address" name="office_address" value="" placeholder="Office Address">
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                  <div class="input-groups">
                    <label for="present_address">Present Address</label>
                    <input type="text" class="form-control" id="present_address" name="present_address" value="" placeholder="Present Address">
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                  <div class="input-groups">
                    <label for="parmanent_address">Parmanent Address</label>
                    <input type="text" class="form-control" id="parmanent_address" name="parmanent_address" value="" placeholder="Parmanent Address">
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                  <div class="input-groups">
                    <label for="parmanent_address">Member Catagory</label>
                    <div class="radio-button-area d-flex align-items-center">
                      <div class="form-check mr-3">
                        <input class="form-check-input" type="radio" name="member_category" id="general_member">
                        <label class="form-check-label" for="general_member">
                          General Member
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="member_category" id="others_member">
                        <label class="form-check-label" for="others_member">
                          Others Member
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="input-groups">
                    <label for="upload_image">Upload Image</label>
                    <input type="file" accept="image/*" class="form-control" id="upload_image" name="upload_image" value="" placeholder="Upload Image">
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