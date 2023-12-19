@extends('frontendmodule::layouts.master')

@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('assets/frontend-module') }}/images/web/banner.png)">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title" style="color: #ff9800">About us</h1>
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->

    <section id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="column-title">Who We Are</h3>
                    <h4>Introduction</h4>
                    <p>Welcome to Cash for Trash, where we've turned a simple concept into a powerful mission. We are not
                        just a company; we are the pioneers of change, on a quest to transform waste into wealth. Discover
                        who we are, our values, and how we're reshaping the narrative of waste disposal.</p>
                    <h4>Our Mission</h4>
                    <p>At Cash for Trash, our mission is clear and concise: to revolutionize waste management by providing a
                        simple yet impactful solution. We aim to incentivize responsible waste disposal while promoting
                        sustainability and environmental consciousness.</p>
                    <h4>Core Values</h4>
                    <p><strong>Responsibility:</strong> We believe in the responsibility we all share towards our planet. By
                        offering a
                        convenient and rewarding solution for waste disposal, we empower individuals to make environmentally
                        conscious choices every day.</p>
                    <p><strong>Transparency:</strong> Cash for Trash operates on a foundation of transparency. From our
                        pricing model to our recycling processes, we strive to keep our customers informed, ensuring a
                        trusting and open relationship with those who choose our services.</p>
                    <p><strong>Innovation:</strong> Embracing innovation is at the heart of Cash for Trash. We continuously
                        explore cutting-edge technologies and creative solutions to optimize waste management and maximize
                        the positive impact on the environment.</p>
                </div><!-- Col end -->

                <div class="col-lg-6">
                  <img src="{{ asset('assets/frontend-module/images/web/about-1.png') }}" width="400" height="750" alt="">
                </div><!-- Col end -->
            </div><!-- Content row end -->

        </div><!-- Container end -->
    </section><!-- Main container end -->


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

    <section id="ts-team" class="ts-team">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h2 class="section-title">Quality Service</h2>
                    <h3 class="section-sub-title">Professional Team</h3>
                </div>
            </div><!--/ Title row end -->

            <div class="row">
                <div class="col-lg-12">
                    <div id="team-slide" class="team-slide">
                        <div class="item">
                            <div class="ts-team-wrapper">
                                <div class="team-img-wrapper">
                                    <img loading="lazy" class="w-100" src="{{ asset('assets/frontend-module') }}/images/team/team3.jpg" alt="team-img">
                                </div>
                                <div class="ts-team-content">
                                    <h3 class="ts-name">Nats Stenman</h3>
                                    <p class="ts-designation">Chief Operating Officer</p>
                                    <p class="ts-description">Nats Stenman began his career in construction with boots on
                                        the ground</p>
                                    <div class="team-social-icons">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-google-plus"></i></a>
                                        <a href="#"><i class="fab fa-linkedin"></i></a>
                                    </div><!--/ social-icons-->
                                </div>
                            </div><!--/ Team wrapper end -->
                        </div><!-- Team 1 end -->

                        <div class="item">
                            <div class="ts-team-wrapper">
                                <div class="team-img-wrapper">
                                    <img loading="lazy" class="w-100" src="{{ asset('assets/frontend-module') }}/images/team/team3.jpg" alt="team-img">
                                </div>
                                <div class="ts-team-content">
                                    <h3 class="ts-name">Angela Lyouer</h3>
                                    <p class="ts-designation">Innovation Officer</p>
                                    <p class="ts-description">Nats Stenman began his career in construction with boots on
                                        the ground</p>
                                    <div class="team-social-icons">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-linkedin"></i></a>
                                    </div><!--/ social-icons-->
                                </div>
                            </div><!--/ Team wrapper end -->
                        </div><!-- Team 2 end -->
                    </div><!-- Team slide end -->
                </div>
            </div><!--/ Content row end -->
        </div><!--/ Container end -->
    </section><!--/ Team end -->
@endsection
