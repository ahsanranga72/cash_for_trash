@extends('frontendmodule::layouts.master')

@push('css')
@endpush

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-heading">
                    <h1 class="banner-title" style="color: #ff9800">OTP verification</h1>
                </div>
            </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-2 mb-4">
                    <div class="card-body">
                        <form action="{{ route('customer.auth.forgot-otp-verify') }}" method="post" id="product-select-form">
                            @csrf
                            <div class="d-flex gap-2 justify-content-center">
                                <input type="number" name="otp" id="otp" class="form-control" placeholder="Enter your otp">
                                <button type="submit" class="btn btn-primary mx-4">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
