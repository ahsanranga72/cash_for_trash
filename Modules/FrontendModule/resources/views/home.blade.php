@extends('frontendmodule::layouts.master')

@section('content')
    <div class="banner-carousel banner-carousel-2 mb-0">
        <div class="banner-carousel-item"
            style="background-image:url({{ asset('assets/frontend-module') }}/images/web/slide-1.jpg)">
            <div class="container">
                <div class="box-slider-content">
                    <div class="box-slider-text">
                        <h2 class="box-slide-title">We will help you</h2>
                        <h3 class="box-slide-sub-title">To make money from trash</h3>
                        <p class="box-slide-description">Join with us to make world more beautiful.</p>
                        <p>
                            <a href="{{ route('products.rate') }}" class="slider btn btn-primary">Products rate</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="banner-carousel-item"
            style="background-image:url({{ asset('assets/frontend-module') }}/images/web/slide-2.jpg)">
            <div class="slider-content text-left">
                <div class="container">
                    <div class="box-slider-content">
                        <div class="box-slider-text">
                            <h2 class="box-slide-title">Do you know?</h2>
                            <h3 class="box-slide-sub-title">70% of trash are recyclable</h3>
                            <p class="box-slide-description">Why waiting? Give us trash and make money from it.</p>
                            <p><a href="{{ route('about-us') }}" class="slider btn btn-primary" aria-label="about-us">Know
                                    Us</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="call-to-action no-padding">
        <div class="container">
            <div class="action-style-box">
                <div class="row">
                    <div class="col-md-8 text-center text-md-left">
                        <div class="call-to-action-text">
                            <h3 class="action-title">Sell us your trash</h3>
                        </div>
                    </div><!-- Col end -->
                    <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
                        <div class="call-to-action-btn">
                            <a class="btn btn-primary" href="{{ route('products.rate') }}">Get Price</a>
                        </div>
                    </div><!-- col end -->
                </div><!-- row end -->
            </div><!-- Action style box -->
        </div><!-- Container end -->
    </section><!-- Action end -->

    <section id="ts-features" class="ts-features pb-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="ts-service-box">
                        <div class="ts-service-image-wrapper">
                            <img loading="lazy" class="w-100"
                                src="{{ asset('assets/frontend-module') }}/images/web/ser-1.jpg" alt="service-image">
                        </div>
                        <div>
                            <h3>Idea</h3>
                            <p>This is our dream to make world beautiful by removing all of the trashes.</p>
                        </div>
                    </div><!-- Service1 end -->
                </div><!-- Col 1 end -->

                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="ts-service-box">
                        <div class="ts-service-image-wrapper">
                            <img loading="lazy" class="w-100"
                                src="{{ asset('assets/frontend-module') }}/images/web/ser-2.jpg" alt="service-image">
                        </div>
                        <div>
                            <h3>Collection</h3>
                            <p>We will collect as much as possible types of trashes.</p>
                        </div>
                    </div><!-- Service2 end -->
                </div><!-- Col 2 end -->

                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="ts-service-box">
                        <div class="ts-service-image-wrapper">
                            <img loading="lazy" class="w-100"
                                src="{{ asset('assets/frontend-module') }}/images/web/ser-5.jpg" alt="service-image">
                        </div>
                        <div>
                            <h3>Recycle To Last</h3>
                            <p>We will recycle as much as we can.</p>
                        </div>
                    </div><!-- Service3 end -->
                </div><!-- Col 3 end -->
            </div><!-- Content row end -->
        </div><!-- Container end -->
    </section><!-- Feature are end -->

    <section id="facts" class="facts-area dark-bg">
        <div class="container">
            <div class="facts-wrapper">
                <div class="row">
                    <div class="col-md-3 col-sm-6 ts-facts">
                        <div class="ts-facts-img">
                            <img loading="lazy" src="{{ asset('assets/frontend-module') }}/images/icon-image/fact1.png"
                                alt="facts-img">
                        </div>
                        <div class="ts-facts-content">
                            <h2 class="ts-facts-num"><span class="counterUp" data-count="10">0</span></h2>
                            <h3 class="ts-facts-title">Total Sites</h3>
                        </div>
                    </div><!-- Col end -->

                    <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-sm-0">
                        <div class="ts-facts-img">
                            <img loading="lazy" src="{{ asset('assets/frontend-module') }}/images/icon-image/fact2.png"
                                alt="facts-img">
                        </div>
                        <div class="ts-facts-content">
                            <h2 class="ts-facts-num"><span class="counterUp" data-count="2">0</span></h2>
                            <h3 class="ts-facts-title">Staff Members</h3>
                        </div>
                    </div><!-- Col end -->

                    <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
                        <div class="ts-facts-img">
                            <img loading="lazy" src="{{ asset('assets/frontend-module') }}/images/icon-image/fact3.png"
                                alt="facts-img">
                        </div>
                        <div class="ts-facts-content">
                            <h2 class="ts-facts-num"><span class="counterUp" data-count="1000">0</span></h2>
                            <h3 class="ts-facts-title">Hours of Work</h3>
                        </div>
                    </div><!-- Col end -->

                    <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
                        <div class="ts-facts-img">
                            <img loading="lazy" src="{{ asset('assets/frontend-module') }}/images/icon-image/fact4.png"
                                alt="facts-img">
                        </div>
                        <div class="ts-facts-content">
                            <h2 class="ts-facts-num"><span class="counterUp" data-count="4">0</span></h2>
                            <h3 class="ts-facts-title">Center</h3>
                        </div>
                    </div><!-- Col end -->

                </div> <!-- Facts end -->
            </div>
            <!--/ Content row end -->
        </div>
        <!--/ Container end -->
    </section><!-- Facts end -->

    <section id="ts-service-area" class="ts-service-area pb-0">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <h2 class="section-title">We Love</h2>
                    <h3 class="section-sub-title">What We Do</h3>
                </div>
            </div>
            <!--/ Title row end -->

            <div class="row">
                <div class="col-lg-4">
                    <div>
                        <h3>Trash Collection</h3>
                        <p>Welcome to Cash for Trash, where we believe in turning waste into wealth through our
                            innovative Cash for Trash program. Our mission is simple yet powerful: to create a sustainable
                            and eco-friendly future by incentivizing individuals to responsibly dispose of their unwanted
                            items.</p>
                    </div>
                </div><!-- Col end -->

                <div class="col-lg-4 text-center">
                    <img loading="lazy" class="img-fluid"
                        src="{{ asset('assets/frontend-module') }}/images/web/ser-6.jpeg" alt="service-avater-image">
                </div><!-- Col end -->

                <div class="col-lg-4 mt-5 mt-lg-0 mb-4 mb-lg-0">
                    <div>
                        <h3>Recycle Trashes</h3>
                        <p>In a world where environmental consciousness is paramount, recycling trashes has become a vital
                            step toward a sustainable future. At Cash for Trash, we are dedicated to fostering a
                            culture of responsible waste management, and we invite you to join us in this eco-friendly
                            journey. Let's explore the significance of recycling trashes and how it contributes to a
                            healthier planet.</p>
                    </div>
                </div><!-- Col end -->
            </div><!-- Content row end -->

        </div>
        <!--/ Container end -->
    </section><!-- Service end -->
@endsection
