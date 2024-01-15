@extends('frontendmodule::layouts.master')

@push('css')
@endpush

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-heading">
                    <h1 class="banner-title" style="color: #ff9800">Order details</h1>
                </div>
            </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
    <div class="container mt-4 mb-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Products</h3>
                    </div>
                    <div class="card-body">
                        <ol>
                            @forelse ($order['products'] as $key => $product)
                                <li>{{ $product->name }} ( ৳ {{ $product->price }} )</li>
                            @empty
                            @endforelse
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Address</h3>
                    </div>
                    <div class="card-body">
                        <p>Name : {{ $order->address->name }}</p>
                        <p>Mobile : {{ $order->address->mobile }}</p>
                        <p>Address : {{ $order->address->address }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h3>General Informations</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <h5>Images</h5>
                                <div class="d-flex">
                                    @forelse (json_decode($order['images'], true) as $image)
                                        <img src="{{ asset('storage/order') }}/{{ $image }}" alt=""
                                            height="100" width="100" class="mx-2">
                                    @empty
                                    @endforelse ()
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p>Agent point: {{ $order->location->area_name }}</p>
                            </div>
                            <div class="col-md-6">
                                <p>Trash weight: {{ $order->trash_weight }} KG</p>
                            </div>
                            <div class="col-md-6">
                                <p>Note 1 : {{ $order->customer_note_1 }}</p>
                            </div>
                            <div class="col-md-6">
                                <p>Note 2 : {{ $order->customer_note_2 }}</p>
                            </div>
                            <div class="col-md-6">
                                <p>Agent Note: {{ $order->agent_note }}</p>
                            </div>
                            <div class="col-md-6">
                                <p>Status: {{ $order->status }}</p>
                            </div>
                            <div class="col-md-6">
                                <p>Available date: {{ $order->available_date }}</p>
                            </div>
                            <div class="col-md-6">
                                <p>Available time: {{ $order->available_time }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $(function() {
                $("form[name='add-address']").validate({
                    rules: {
                        name: "required",
                        address: "required",
                        mobile: {
                            required: true,
                            phoneBD: true,
                        },
                    },
                    messages: {
                        name: "Please enter your name",
                        address: "Please enter your address",
                        mobile: {
                            required: "Please enter your mobile number",
                        }
                    },
                    submitHandler: function(form) {
                        form.submit();
                    }
                });
            });
            $.validator.addMethod("phoneBD", function(phoneNumber, element) {
                phoneNumber = phoneNumber.replace(/\s+/g, "");
                return this.optional(element) || phoneNumber.match(/^(?:\+8801\d{9}|\d{11})$/);
            }, "Please enter a valid Bangladeshi mobile number");
        })
    </script>
@endpush
