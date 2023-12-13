@extends('adminmodule::layouts.master')

@section('page_title', 'Admin product edit')

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
                    <form action="{{ route('admin.products.update', $product['id']) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                                <div class="form-group">
                                    <label for="name" class="form-label">Name<span class="text-red">
                                            *</span></label>
                                    <input type="text" class="form-control" id="name" name="name" required
                                        placeholder="Enter name" value="{{ $product['name'] }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-6">
                                <div class="form-group">
                                    <label for="category_id" class="form-label">Category <span
                                            class="text-red">*</span></label>
                                    <select class="form-control select2" name="category_id" id="category_id"
                                        data-placeholder="Select Category" required>
                                        <option value=""></option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category['id'] }}"
                                                {{ $product->category->id == $category->id ? 'selected' : '' }}>
                                                {{ $category['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                                <div class="form-group">
                                    <label for="price" class="form-label">Price<span class="text-red">
                                            *</span></label>
                                    <input type="number" class="form-control" id="price" name="price" required
                                        placeholder="Enter price" value="{{ $product['price'] }}">
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
@endpush
