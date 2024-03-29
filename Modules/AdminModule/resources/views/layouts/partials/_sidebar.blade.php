<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('assets') }}/logo.png" height="50" class="header-brand-img desktop-logo"
                    alt="logo">
                <img src="{{ asset('assets') }}/logo.png" height="50" class="header-brand-img toggle-logo"
                    alt="logo">
                <img src="{{ asset('assets') }}/logo.png" height="50" class="header-brand-img light-logo"
                    alt="logo">
                <img src="{{ asset('assets') }}/logo.png" height="50" class="header-brand-img light-logo1"
                    alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu" style="overflow: auto;max-height: 100vh;">
            <div class="slide-left disabled" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg>
            </div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3 class="text-upper">Dashboard</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('admin.dashboard') }}"><i
                            class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
                </li>
                <li class="sub-category">
                    <h3>Order</h3>
                </li>
                <li class="slide {{ request()->is('admin/order*') ? 'active is-expanded' : '' }}">
                    <a class="side-menu__item {{ request()->is('admin/order*') ? 'active is-expanded' : '' }}"
                        data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fe fe-zap"></i><span
                            class="side-menu__label">Orders</span><i class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.orders', ORDER_STATUS['all']) }}"
                                class="slide-item text-capitalize {{ request()->is('admin/orders/all') ? 'active' : '' }}">
                                {{ ORDER_STATUS['all'] }}</a></li>
                    </ul>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.orders', ORDER_STATUS['pending']) }}"
                                class="slide-item text-capitalize {{ request()->is('admin/orders/pending') ? 'active' : '' }}">
                                {{ ORDER_STATUS['pending'] }}</a></li>
                    </ul>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.orders', ORDER_STATUS['processing']) }}"
                                class="slide-item text-capitalize {{ request()->is('admin/orders/processing') ? 'active' : '' }}">
                                {{ ORDER_STATUS['processing'] }}</a></li>
                    </ul>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.orders', ORDER_STATUS['completed']) }}"
                                class="slide-item text-capitalize {{ request()->is('admin/orders/completed') ? 'active' : '' }}">
                                {{ ORDER_STATUS['completed'] }}</a></li>
                    </ul>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.orders', ORDER_STATUS['cancelled']) }}"
                                class="slide-item text-capitalize {{ request()->is('admin/orders/cancelled') ? 'active' : '' }}">
                                {{ ORDER_STATUS['cancelled'] }}</a></li>
                    </ul>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.orders', ORDER_STATUS['postponed']) }}"
                                class="slide-item text-capitalize {{ request()->is('admin/orders/postponed') ? 'active' : '' }}">
                                {{ ORDER_STATUS['postponed'] }}</a></li>
                    </ul>
                </li>
                <li class="sub-category">
                    <h3>Product</h3>
                </li>
                <li class="slide {{ request()->segment(3) == 'category' ? 'active is-expanded' : '' }}">
                    <a class="side-menu__item {{ request()->segment(3) == 'category' ? 'active is-expanded' : '' }}"
                        data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fe fe-menu"></i><span
                            class="side-menu__label">Category</span><i class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.products.category.create') }}"
                                class="slide-item {{ request()->is('admin/products/category/create') ? 'active' : '' }}">
                                Add</a></li>
                    </ul>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.products.category.index') }}"
                                class="slide-item {{ request()->is('admin/products/category') ? 'active' : '' }}">
                                List</a></li>
                    </ul>
                </li>
                <li
                    class="slide {{ request()->segment(2) == 'products' && request()->segment(3) != 'category' ? 'active is-expanded' : '' }}">
                    <a class="side-menu__item {{ request()->segment(2) == 'products' && request()->segment(3) != 'category' ? 'active is-expanded' : '' }}"
                        data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fe fe-box"></i><span
                            class="side-menu__label">Product</span><i class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.products.create') }}"
                                class="slide-item {{ request()->is('admin/products/create') ? 'active' : '' }}">
                                Add</a></li>
                    </ul>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.products.index') }}"
                                class="slide-item {{ request()->is('admin/products') ? 'active' : '' }}">
                                List</a></li>
                    </ul>
                </li>
                <li class="sub-category">
                    <h3>Agent</h3>
                </li>
                <li class="slide {{ request()->segment(3) == 'locations' ? 'active is-expanded' : '' }}">
                    <a class="side-menu__item {{ request()->segment(3) == 'locations' ? 'active is-expanded' : '' }}"
                        data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-globe"></i><span class="side-menu__label">Location</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.agent.locations.create') }}"
                                class="slide-item {{ request()->is('admin/agent/locations/create') ? 'active' : '' }}">
                                Add</a></li>
                    </ul>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.agent.locations.index') }}"
                                class="slide-item {{ request()->is('admin/agent/locations') ? 'active' : '' }}">
                                List</a></li>
                    </ul>
                </li>
                <li
                    class="slide {{ request()->segment(2) == 'agent' && request()->segment(3) != 'locations' ? 'active is-expanded' : '' }}">
                    <a class="side-menu__item {{ request()->segment(2) == 'agent' && request()->segment(3) != 'locations' ? 'active is-expanded' : '' }}"
                        data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Agent</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.agent.create') }}"
                                class="slide-item {{ request()->is('admin/agent/create') ? 'active' : '' }}">
                                Add</a></li>
                    </ul>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.agent.index') }}"
                                class="slide-item {{ request()->is('admin/agent') ? 'active' : '' }}">
                                List</a></li>
                    </ul>
                </li>
                <li class="sub-category">
                    <h3>Customer</h3>
                </li>
                <li class="slide {{ request()->segment(2) == 'customer-list' ? 'active is-expanded' : '' }}">
                    <a class="side-menu__item {{ request()->segment(2) == 'customer-list' ? 'active is-expanded' : '' }}"
                        data-bs-toggle="slide" href="{{ route('admin.customer-list') }}"><i class="side-menu__icon fe fe-users"></i><span
                            class="side-menu__label">Customer list</span></a>
                </li>
            </ul>
            <div style="height: 100px;"></div>
            <div class="slide-right" id="slide-right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg>
            </div>
        </div>
    </div>
    <!--/APP-SIDEBAR-->
</div>
