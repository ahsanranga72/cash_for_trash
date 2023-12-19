@extends('frontendmodule::layouts.master')

@push('css')
    <style>
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
                    <h1 class="banner-title" style="color: #ff9800">Dashboard</h1>
                </div>
            </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
    <div class="container mt-4 mb-5">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-body">
                    <div class="mb-2 w-100">
                        <a href="{{ route('customer.dashboard', 'orders') }}"
                            class="btn btn-primary w-100 {{ request()->route()->parameters['slug'] == 'orders' ? 'active' : '' }}">Orders</a>
                    </div>
                    <div class="mb-2 w-100">
                        <a href="{{ route('customer.dashboard', 'addresses') }}"
                            class="btn btn-primary w-100 {{ request()->route()->parameters['slug'] == 'addresses' ? 'active' : '' }}">Addresses</a>
                    </div>
                    <div class="w-100">
                        <a href="{{ route('customer.dashboard', 'profile') }}"
                            class="btn btn-primary w-100 {{ request()->route()->parameters['slug'] == 'profile' ? 'active' : '' }}">Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card card-body">
                    @if (request()->route()->parameters['slug'] == 'orders')
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $key => $order)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $order->product->name }}</td>
                                        <td>{{ $order->address->address }}</td>
                                        <td>{{ $order->status }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center align-middle"
                                            style="padding: 3rem 0 !important;">
                                            Nothing to show !</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    @endif
                    @if (request()->route()->parameters['slug'] == 'addresses')
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Address</th>
                                    <th scope="col" class="text-center align-middle">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($customer_addresses as $key => $address)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $address->name }}</td>
                                        <td>{{ $address->mobile }}</td>
                                        <td>{{ $address->address }}</td>
                                        <td class="text-center align-middle">
                                            <button type="button" class="btn text-primary btn-sm" data-toggle="modal"
                                                data-target="#exampleModal-{{ $address->id }}">
                                                <span class="fe fe-edit fs-14"></span>
                                            </button>
                                            <a class="btn text-danger btn-sm" href="javascript:void(0)"
                                                onclick="alert_function('delete-{{ $address->id }}')"
                                                data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                <span class="fe fe-trash-2 fs-14"></span></a>
                                            <form action="{{ route('customer.addresses.destroy', $address->id) }}"
                                                id="delete-{{ $address->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal-{{ $address->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Address</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('customer.addresses.update', $address->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="name" class="col-form-label">Name</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" placeholder="name"
                                                                value="{{ $address->name }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="mobile" class="col-form-label">Mobile</label>
                                                            <input type="text" class="form-control" id="mobile"
                                                                name="mobile" placeholder="mobile"
                                                                value="{{ $address->mobile }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="address" class="col-form-label">Address</label>
                                                            <textarea class="form-control" id="address" name="address" placeholder="address">{{ $address->address }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center align-middle"
                                                style="padding: 3rem 0 !important;">
                                                Nothing to show !</td>
                                        </tr>
                                @endforelse
                            </tbody>
                        </table>
                    @endif
                    @if (request()->route()->parameters['slug'] == 'profile')
                        <form action="{{ route('customer.profile-update') }}" method="POST" name="profile">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="first_name" class="col-form-label">First name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    placeholder="first name" value="{{ $user->first_name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="last_name" class="col-form-label">Last name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    placeholder="last name" value="{{ $user->last_name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="email" value="{{ $user->email }}" required>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-form-label">Mobile</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="phone" value="{{ $user->phone }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Update</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $(function() {
                $("form[name='profile']").validate({
                    rules: {
                        first_name: "required",
                        last_name: "required",
                        email: {
                            required: true,
                            email: true
                        },
                        phone: {
                            required: true,
                            phoneBD: true,
                        },
                    },
                    messages: {
                        first_name: "Please enter your first name",
                        last_name: "Please enter your last name",
                        email: "Please enter a valid email address",
                        phone: {
                            required: "Please enter your phone number",
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
