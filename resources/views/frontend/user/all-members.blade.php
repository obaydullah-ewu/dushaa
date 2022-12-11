@extends('frontend.layouts.app')

@section('content')
    <div class="ptb-70">
        <div class="container">
            <div class="row">
                @include('frontend.user.sidebar')
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="page-content-wrapper">
                        <div class="page-content-header">
                            <h3>{{ @$pageTitle }}</h3>
                        </div>
                        <div class="page-content mt-30">
                            <form action="" method="get">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-4">
                                    <div class="input-groups">
                                        <label>Select Profession</label>
                                        <select name="profession_id" class="form-select" >
                                            <option value="">--Select Profession--</option>
                                            @foreach($professions as $profession)
                                                <option value="{{ $profession->id }}" {{ app('request')->profession_id == $profession->id ? 'selected' : '' }}>
                                                    {{ $profession->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-4">
                                    <div class="input-groups">
                                        <label>Select Designation</label>
                                        <select name="profession_id" class="form-select" >
                                            <option value="">--Select Designation--</option>
                                            @foreach($designations as $designation)
                                                <option value="{{ $designation->id }}" {{ app('request')->designation_id == $designation->id ? 'selected' : '' }}>
                                                    {{ $designation->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-4">
                                    <div class="input-groups">
                                        <label>Select Department</label>
                                        <select name="profession_id" class="form-select">
                                            <option value="">--Select Department--</option>
                                            @foreach($departments as $department)
                                                <option value="{{ $department->id }}" {{ app('request')->department_id == $department->id ? 'selected' : '' }}>
                                                    {{ $department->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-6 d-flex">
                                    <input type="search" class="form-control "
                                           name="search_string" id="search_string" placeholder="Search name" value="{{ app('request')->search_string }}"/>
                                    <button type="submit" class="ms-2 default-button"><span>Search</span></button>
                                </div>
                            </div>
                            </form>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <table class="table table-striped table-responsive">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Details</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Mobile Number</th>
                                            <th scope="col">Member Category</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($members as $member)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>

                                                <td>
                                                    <b>Name:</b> {{ $member->name }}<br>
                                                    <b>Department:</b> {{ @$member->department->name . ' (' . $member->session_year . ')' }}<br>
                                                    <b>Profession:</b> {{ @$member->profession->name }}<br>
                                                    <b>Designation:</b> {{ @$member->designation->name }}<br>
                                                </td>
                                                <td>{{ $member->email }}</td>
                                                <td>{{ $member->mobile_number }}</td>
                                                <td>{{ @$member->memberCategory->name }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">No Member Found</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                    {{ $members->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
