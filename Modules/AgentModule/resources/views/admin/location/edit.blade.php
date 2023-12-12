@extends('adminmodule::layouts.master')

@section('page_title', 'Admin agent location edit')

@push('page_css')
@endpush

@section('main_content')
    <!-- Row -->
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit form</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.agent.locations.update', $location['id']) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                                <div class="form-group">
                                    <label for="area_name" class="form-label">Area name<span class="text-red">
                                            *</span></label>
                                    <input type="text" class="form-control" id="area_name" name="area_name" required
                                        placeholder="Enter area name" value="{{ $location['area_name'] }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-6">
                                <div class="form-group">
                                    <label for="district" class="form-label">District<span class="text-red">
                                            *</span></label>
                                    <input type="text" class="form-control" id="district" name="district" required
                                        placeholder="Enter district" value="{{ $location['district'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                                <div class="form-group">
                                    <label for="police_station" class="form-label">Police station<span class="text-red">
                                            *</span></label>
                                    <input type="text" class="form-control" id="police_station" name="police_station" required
                                        placeholder="Enter police station" value="{{ $location['police_station'] }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-6">
                                <div class="form-group">
                                    <label for="post_code" class="form-label">Post code<span class="text-red">
                                            *</span></label>
                                    <input type="text" class="form-control" id="post_code" name="post_code" required
                                        placeholder="Enter post code" value="{{ $location['post_code'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-xl-12 mt-3">
                                <button type="submit" class="btn btn-primary float-end mb-0">Update</button>
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
@endpush
