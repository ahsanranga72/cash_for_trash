@extends('adminmodule::layouts.master')

@section('page_title', 'Admin products category edit')

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
                    <form action="{{ route('admin.products.category.update', $category['id']) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                                <div class="form-group">
                                    <label for="name" class="form-label">Name<span class="text-red">
                                            *</span></label>
                                    <input type="text" class="form-control" id="name" name="name" required
                                        placeholder="Enter name" value="{{ $category['name'] }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-6 mt-3">
                                <button type="submit" class="btn btn-primary mt-5">Update</button>
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
