@extends('adminmodule::layouts.master')

@section('page_title', 'Admin agent create')

@push('page_css')
@endpush

@section('main_content')
    <!-- Row -->
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create form</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.agent.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-xl-12">
                                <input type="hidden" name="image-source"
                                    value="{{ asset('assets/placeholder-image.png') }}" id="image-source" />
                                <center>
                                    <img id="profile_image" src="{{ asset('assets/placeholder-image.png') }}"
                                        class="img-responsive br-5 preview" width="300">
                                </center>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                                <div class="form-group">
                                    <label for="profile_image" class="form-label">Profile image</label>
                                    <input type="file" class="form-control" id="profile_image" name="profile_image"
                                        onchange="read_image(this, 'profile_image')">
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-6">
                                <div class="form-group">
                                    <label for="location_id" class="form-label">Location <span
                                            class="text-red">*</span></label>
                                    <select class="form-control select2" name="location_id" id="location_id"
                                        data-placeholder="Select Location" required>
                                        @foreach ($locations as $location)
                                            <option value="{{ $location['id'] }}">
                                                {{ $location['area_name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                                <div class="form-group">
                                    <label for="first_name" class="form-label">First name<span class="text-red">
                                            *</span></label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" required
                                        placeholder="Enter first name">
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-6">
                                <div class="form-group">
                                    <label for="last_name" class="form-label">Last name<span class="text-red">
                                            *</span></label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" required
                                        placeholder="Enter last name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email<span class="text-red"> *</span></label>
                                    <input type="email" class="form-control" id="email" name="email" required
                                        placeholder="Enter email">
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-6">
                                <div class="form-group">
                                    <label for="phone" class="form-label">Phone number<span class="text-red">
                                            *</span></label>
                                    <input type="text" class="form-control" id="phone" name="phone" required
                                        placeholder="Enter phone number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                                <div class="form-group">
                                    <label for="password" class="form-label">Password<span class="text-red">
                                            *</span></label>
                                    <input type="password" class="form-control" id="password" name="password" required
                                        placeholder="Enter password">
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-6">
                                <div class="form-group">
                                    <label for="password_confirmation" class="form-label">Confirm password<span
                                            class="text-red"> *</span></label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" required placeholder="Enter password">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-xl-12 mt-3">
                                <button type="submit" class="btn btn-primary float-end mb-0">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
@endsection

@push('page_js')
    <script src="{{ asset('assets/admin-module') }}/plugins/select2/select2.full.min.js"></script>
    <script src="{{ asset('assets/admin-module') }}/js/select2.js"></script>
@endpush
