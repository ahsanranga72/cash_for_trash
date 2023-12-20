<header id="header" class="header-two">
    <div class="site-navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light p-0">

                        <div class="logo">
                            <a class="d-block" href="{{ route('home') }}">
                                <img loading="lazy" src="{{ asset('assets/logo.png') }}" alt="Cash for trash">
                            </a>
                        </div><!-- logo end -->

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div id="navbar-collapse" class="collapse navbar-collapse">
                            <ul class="nav navbar-nav ml-auto align-items-center">
                                <li
                                    class="nav-item dropdown  {{ request()->route()->getName() == 'home'? 'active': '' }}">
                                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                                </li>
                                <li
                                    class="nav-item dropdown {{ request()->route()->getName() == 'products.rate'? 'active': '' }}">
                                    <a href="{{ route('products.rate') }}" class="nav-link">Products Rate</a>
                                </li>
                                <li
                                    class="nav-item dropdown {{ request()->route()->getName() == 'about-us'? 'active': '' }}">
                                    <a class="nav-link" href="{{ route('about-us') }}">About us</a>
                                </li>
                                <li
                                    class="nav-item dropdown {{ request()->route()->getName() == 'contact-us'? 'active': '' }}">
                                    <a class="nav-link" href="{{ route('contact-us') }}">Contact us</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Agent
                                        <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route('agent.auth.login') }}">Log in</a></li>
                                        <li><a href="{{ route('agent.request-form') }}">Become a Agent</a></li>
                                    </ul>
                                </li>
                                @if (auth()->check() && auth()->user()->user_type == CUSTOMER)
                                    <li class="nav-item dropdown">
                                        <a href="#" class="nav-link dropdown-toggle btn btn-primary"
                                            style="padding: 0 16px !important"
                                            data-toggle="dropdown">{{ auth()->user()->first_name }}
                                            <i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ route('customer.dashboard', 'orders') }}">Dashboard</a>
                                            </li>
                                            <li><a href="javascript:void(0)" onclick="alert_function('logout-form')">Log
                                                    out</a></li>
                                        </ul>
                                    </li>
                                    <form action="{{ route('customer.auth.logout') }}" method="post" id="logout-form"
                                        class="hide">
                                        @csrf
                                    </form>
                                @else
                                    <li class="header-get-a-quote">
                                        <a class="btn btn-primary" href="{{ route('customer.auth.login') }}">Log in</a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </nav>
                </div>
                <!--/ Col end -->
            </div>
            <!--/ Row end -->
        </div>
        <!--/ Container end -->

    </div>
    <!--/ Navigation end -->
</header>
