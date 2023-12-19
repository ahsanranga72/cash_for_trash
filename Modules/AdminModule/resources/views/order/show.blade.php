@extends('adminmodule::layouts.master')

@section('page_title', 'Admin order details')

@push('page_css')
@endpush

@section('main_content')
    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-8">
            <div class="card cart">
                <div class="card-header">
                    <h3 class="card-title">Details</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xl-6">
                            <h5>Customer details</h5>
                            <p>Name: {{ $order->customer->first_name }}</p>
                            <p>Email: {{ $order->customer->email }}</p>
                            <p>Phone: {{ $order->customer->phone }}</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xl-6">
                            <h5>Agent details</h5>
                            <p>Name: {{ $order->agent->first_name ?? '' }}</p>
                            <p>Email: {{ $order->agent->email ?? '' }}</p>
                            <p>Phone: {{ $order->agent->phone ?? '' }}</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xl-6">
                            <h5>Customer Address</h5>
                            <p>Name: {{ $order->address->name ?? '' }}</p>
                            <p>Email: {{ $order->address->mobile ?? '' }}</p>
                            <p>Phone: {{ $order->address->address ?? '' }}</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xl-6">
                            <h5>Agent point details</h5>
                            <p>Area name: {{ $order->location->area_name ?? '' }}</p>
                            <p>District: {{ $order->location->district ?? '' }}</p>
                            <p>Police station: {{ $order->location->police_station ?? '' }}</p>
                            <p>Post code: {{ $order->location->post_code ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-4 col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Status</div>
                </div>
                <div class="card-body py-2">
                    <h4>Current status: {{ $order->status }}</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-1 CLOSED -->
@endsection

@push('page_js')
@endpush
