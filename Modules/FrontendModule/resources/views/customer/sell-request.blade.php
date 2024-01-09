@extends('frontendmodule::layouts.master')

@push('css')
    <style>
        i.fa-lg.me-3.fa-fw {
            margin-top: -40px;
            margin-right: 10px;
        }

        form .error {
            color: #ff0000;
        }
    </style>
@endpush

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-heading">
                    <h1 class="banner-title" style="color: #ff9800">Confirm sell request</h1>
                </div>
            </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
    <div class="container mt-4">
        <form action="{{ route('customer.order-submit') }}" method="POST" id="address-form" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-2 mb-4">
                        <div class="card-header">
                            <h3>Added Products</h3>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Rate</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $key => $product)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $product['name'] }}</td>
                                            <td>{{ $product['price'] }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('customer.product-remove-from-cart', $product['id']) }}"
                                                    class="btn btn-sm btn-warning">Remove</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Please add one first !</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Add Address
                    </button>
                </div>
                <div class="col-md-12">
                    <div class="card mt-2 mb-4">
                        <div class="card-header">
                            <h3>Select Address</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @forelse (auth()->user()->addresses as $address)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="address_id"
                                                    id="address-{{ $address->id }}" value="{{ $address->id }}">
                                                <label class="form-check-label" for="address-{{ $address->id }}">
                                                    <h6><strong>Name:</strong> {{ $address->name }}</h6>
                                                    <p style="line-height: 10px; margin: 0 0 12px;"><strong>Mobile:</strong>
                                                        {{ $address->mobile }}</p>
                                                    <p style="line-height: 10px; margin: 0 0 12px;">
                                                        <strong>Address:</strong>
                                                        {{ $address->address }}
                                                    </p>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-md-12 d-flex justify-content-center">
                                        <h1>Please add one first !</h1>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card mt-2 mb-4">
                        <div class="card-header">
                            <h3>Generale informations</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="location_id">Agent point</label>
                                        <select name="location_id" id="location_id" class="form-control">
                                            <option selected disabled>Select nearest agent point</option>
                                            @foreach ($locations as $location)
                                                <option value="{{ $location['id'] }}">{{ $location['area_name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="trash_images">Trash images ( multiple )</label>
                                        <input type="file" class="form-control" name="trash_images[]" id="trash_images" multiple>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="trash_weight">Trash estimated weight</label>
                                        <input type="number" class="form-control" name="trash_weight" id="trash_weight" placeholder="Enter weight in kg (ex:12)">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="customer_note_1">Note</label>
                                        <input type="text" class="form-control" name="customer_note_1" id="customer_note_1" placeholder="Enter your note">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-primary float-right">Submit request</button>
                </div>
            </div>
        </form>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Address</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('customer.addresses.store') }}" method="POST" name="add-address">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name" class="col-form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="name">
                            </div>
                            <div class="form-group">
                                <label for="mobile" class="col-form-label">Mobile</label>
                                <input type="text" class="form-control" id="mobile" name="mobile"
                                    placeholder="mobile">
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-form-label">Address</label>
                                <textarea class="form-control" id="address" name="address" placeholder="address"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
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
