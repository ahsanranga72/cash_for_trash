@extends('adminmodule::layouts.master')

@section('page_title', 'Location create')

@push('page_css')
@endpush

@section('main_content')
    <!-- Row -->
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">create_form</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.agent.locations.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                                <div class="">
                                    <div class="form-group">
                                        <label for="name" class="form-label">brand_name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4 mb-0" style="float: right;">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
@endsection

@push('page_js')
@endpush
