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
                    <h1 class="banner-title" style="color: #ff9800">Agent request form</h1>
                </div>
            </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
    <div class="container">
        <form class="mx-1 mx-md-4" action="{{ route('agent.request-form-submit') }}" method="POST" name="request-form">
            @csrf
            <div class="row mb-5 mt-5 px-5">
                <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 mb-3">
                    <div class="form-outline">
                        <label class="form-label" for="first_name">First name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control"
                            placeholder="First name" required />
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 mb-3">
                    <div class="form-outline">
                        <label class="form-label" for="last_name">Last name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last name"
                            required />
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 mb-3">
                    <div class="form-outline">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                            required />
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 mb-3">
                    <div class="form-outline">
                        <label class="form-label" for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone"
                            required />
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 mb-3">
                    <div class="form-outline">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password"
                            required />
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 mb-3">
                    <div class="form-outline">
                        <label class="form-label" for="confirm_password">Confirm password</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control"
                            placeholder="Confirm password" required />
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 mb-3">
                    <div class="form-outline">
                        <label class="form-label" for="confirm_password">Select location</label>
                        <select name="location_id" id="location_id" class="form-control" required>
                            <option selected disabled>Select your agent point</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location['id'] }}">{{ $location['area_name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 mb-3">
                    <button type="submit" class="btn btn-primary btn-lg float-right">Send request</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $(function() {
                $("form[name='request-form']").validate({
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
                        password: {
                            required: true,
                            minlength: 8
                        },
                        confirm_password: {
                            required: true,
                            equalTo: "#password"
                        }
                    },
                    messages: {
                        first_name: "Please enter your first name",
                        last_name: "Please enter your last name",
                        password: {
                            required: "Please provide a password",
                            minlength: "Your password must be at least 8 characters long"
                        },
                        confirm_password: {
                            required: "Please confirm your password",
                            equalTo: "Passwords do not match"
                        },
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
            }, "Please enter a valid Bangladeshi phone number");
        })
    </script>
@endpush
