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
                        @if (!empty(json_decode($order['images'], true)))
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 mb-5">
                                <h5 class="fw-bold">Images</h5>
                                <div class="d-flex gap-2">
                                    @forelse (json_decode($order['images'], true) as $image)
                                        <img src="{{ asset('storage/order') }}/{{ $image }}" alt=""
                                            height="100" width="100" class="mx-2">
                                    @empty
                                    @endforelse ()
                                </div>
                            </div>
                        @endif
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 mb-5">
                            <h5 class="fw-bold">Products</h5>
                            <ol>
                                @forelse ($order['products'] as $key => $product)
                                    <li>{{ $product->name }} ( ৳ {{ $product->price }} )</li>
                                @empty
                                @endforelse
                            </ol>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xl-6">
                            <h5 class="fw-bold">Customer details</h5>
                            <p>Name: {{ $order->customer->first_name }}</p>
                            <p>Email: {{ $order->customer->email }}</p>
                            <p>Phone: {{ $order->customer->phone }}</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xl-6">
                            <h5 class="fw-bold">Agent details</h5>
                            <p>Name: {{ $order->agent->first_name ?? '' }}</p>
                            <p>Email: {{ $order->agent->email ?? '' }}</p>
                            <p>Phone: {{ $order->agent->phone ?? '' }}</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xl-6 mt-3">
                            <h5 class="fw-bold">Customer Address</h5>
                            <p>Name: {{ $order->address->name ?? '' }}</p>
                            <p>Phone: {{ $order->address->mobile ?? '' }}</p>
                            <p>Address: {{ $order->address->address ?? '' }}</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xl-6 mt-3">
                            <h5 class="fw-bold">Agent point details</h5>
                            <p>Area name: {{ $order->location->area_name ?? '' }}</p>
                            <p>District: {{ $order->location->district ?? '' }}</p>
                            <p>Police station: {{ $order->location->police_station ?? '' }}</p>
                            <p>Post code: {{ $order->location->post_code ?? '' }}</p>
                        </div>
                        <h5 class="fw-bold">Others informations</h5>
                        <div class="col-md-6">
                            <p>Trash weight: {{ $order->trash_weight }} KG</p>
                        </div>
                        <div class="col-md-6">
                            <p>Customer note: {{ $order->customer_note_1 }}</p>
                        </div>
                        <div class="col-md-6">
                            <p>Agent note: {{ $order->agent_note }}</p>
                        </div>
                        <div class="col-md-6">
                            <p>Customer pick request date: {{ $order->available_date }}</p>
                        </div>
                        <div class="col-md-6">
                            <p>Customer pick request time: {{ $order->available_time }}</p>
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
                    <h4 class="fw-bold">Current status: <span class="text-capitalize">{{ $order->status }}</span></h4>
                    <div class="form-group mt-4">
                        <form action="{{ route('admin.order-status-change', $order->id) }}" method="post">
                            @csrf
                            <label for="order_status" class="form-label mt-3">Order status</label>
                            <select class="form-control select2" name="order_status" id="order_status"
                                data-placeholder="Select status">
                                <option selected disabled>Select status</option>
                                <option value="{{ ORDER_STATUS['pending'] }}"
                                    {{ ORDER_STATUS['pending'] === $order->status ? 'selected' : '' }}>
                                    {{ ORDER_STATUS['pending'] }}</option>
                                <option value="{{ ORDER_STATUS['processing'] }}"
                                    {{ ORDER_STATUS['processing'] === $order->status ? 'selected' : '' }}>
                                    {{ ORDER_STATUS['processing'] }}</option>
                                <option value="{{ ORDER_STATUS['completed'] }}"
                                    {{ ORDER_STATUS['completed'] === $order->status ? 'selected' : '' }}>
                                    {{ ORDER_STATUS['completed'] }}</option>
                                <option value="{{ ORDER_STATUS['cancelled'] }}"
                                    {{ ORDER_STATUS['cancelled'] === $order->status ? 'selected' : '' }}>
                                    {{ ORDER_STATUS['cancelled'] }}</option>
                                <option value="{{ ORDER_STATUS['postponed'] }}"
                                    {{ ORDER_STATUS['postponed'] === $order->status ? 'selected' : '' }}>
                                    {{ ORDER_STATUS['postponed'] }}</option>
                            </select>
                            <button type="submit" class="btn btn-primary mt-4 float-end">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-1 CLOSED -->
@endsection

@push('page_js')
    <script src="{{ asset('assets/admin-module') }}/plugins/select2/select2.full.min.js"></script>
    <script src="{{ asset('assets/admin-module') }}/js/select2.js"></script>
@endpush
