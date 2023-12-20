@extends('frontendmodule::layouts.master')

@push('css')
    <style>
        i.fa-lg.me-3.fa-fw {
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
                    <h1 class="banner-title" style="color: #ff9800">Customer</h1>
                </div>
            </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-12 col-xl-11">
                <div class="card" style="border: none">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                                <form class="mx-1 mx-md-4" action="{{ route('customer.auth.registration') }}" method="POST"
                                    name="registration">
                                    @csrf
                                    <div class="d-flex flex-row align-items-center mb-3">
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="first_name">Your Name</label>
                                            <input type="text" name="first_name" id="first_name" class="form-control"
                                                placeholder="Name" required />
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-3">
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="email">Your Email</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                placeholder="Email" required />
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-3">
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" name="password" id="password" class="form-control"
                                                placeholder="Password" required />
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-3">
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="password_confirmation">Confirm
                                                password</label>
                                            <input type="password" name="password_confirmation" id="password_confirmation"
                                                class="form-control" placeholder="Confirm password" required />
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-primary btn-lg">Register</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-6 order-1 order-lg-2">
                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Log in</p>
                                <form class="mx-1 mx-md-4" action="{{ route('customer.auth.login') }}" method="POST"
                                    name="login">
                                    @csrf
                                    <div class="d-flex flex-row align-items-center mb-3">
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="form3Example3c">Your Email</label>
                                            <input type="email" id="form3Example3c" class="form-control"
                                                placeholder="Email" name="email" required />
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-3">
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="form3Example4c">Password</label>
                                            <input type="password" id="form3Example4c" class="form-control"
                                                placeholder="Password" name="password" required />
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-primary btn-lg">Log in</button>
                                    </div>
                                </form>
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
                $("form[name='registration']").validate({
                    rules: {
                        first_name: "required",
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true,
                            minlength: 8
                        },
                        password_confirmation: {
                            required: true,
                            equalTo: "#password"
                        }
                    },
                    messages: {
                        first_name: "Please enter your name",
                        password: {
                            required: "Please provide a password",
                            minlength: "Your password must be at least 8 characters long"
                        },
                        password_confirmation: {
                            required: "Please confirm your password",
                            equalTo: "Passwords do not match"
                        },
                        email: "Please enter a valid email address"
                    },
                    submitHandler: function(form) {
                        form.submit();
                    }
                });
            });

            $(function() {
                $("form[name='login']").validate({
                    rules: {
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true,
                            minlength: 8
                        }
                    },
                    messages: {
                        password: {
                            required: "Please provide a password",
                            minlength: "Your password must be at least 8 characters long"
                        },
                        email: "Please enter a valid email address"
                    },
                    submitHandler: function(form) {
                        form.submit();
                    }
                });
            });
        })
    </script>
@endpush
