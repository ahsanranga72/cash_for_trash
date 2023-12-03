<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="index.html">
                <img src="{{asset('assets')}}/logo.png" height="50"
                     class="header-brand-img desktop-logo" alt="logo">
                <img src="{{asset('assets')}}/logo.png" height="50"
                     class="header-brand-img toggle-logo"
                     alt="logo">
                <img src="{{asset('assets')}}/logo.png" height="50"
                     class="header-brand-img light-logo" alt="logo">
                <img src="{{asset('assets')}}/logo.png" height="50"
                     class="header-brand-img light-logo1"
                     alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu" style="overflow: auto;max-height: 100vh;">
            <div class="slide-left disabled" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg"
                     fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"/>
                </svg>
            </div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3 class="text-upper">business</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('admin.dashboard') }}"><i
                            class="side-menu__icon fe fe-home"></i><span
                            class="side-menu__label">12354</span></a>
                </li>
                {{-- <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('admin.chats.index') }}"><i
                            class="side-menu__icon fe fe-message-circle"></i><span
                            class="side-menu__label">{{ trans_admin('chat') }}</span></a>
                </li> --}}
                {{-- <li class="sub-category">
                    <h3>{{strtoupper(trans_admin('orders'))}}</h3>
                </li>
                <li class="slide {{(request()->segment(2) == 'orders')?'active is-expanded':''}}">
                    <a class="side-menu__item {{(request()->segment(2) == 'orders')?'active is-expanded':''}}"
                       data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-package"></i><span
                            class="side-menu__label">{{ trans_admin('inhouse_orders') }}</span></a>
                </li>
                <li class="slide {{(request()->segment(2) == 'orders')?'active is-expanded':''}}">
                    <a class="side-menu__item {{(request()->segment(2) == 'orders')?'active is-expanded':''}}"
                       data-bs-toggle="slide"
                       href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-shopping-cart"></i><span
                            class="side-menu__label">{{ trans_admin('orders') }}</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.orders.get-by-status', 'all') }}"
                               class="slide-item {{request()->is('admin/orders/status/all')?'active':''}}">
                                {{ trans_admin('all') }}</a></li>
                    </ul>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.orders.get-by-status', 'pending') }}"
                               class="slide-item {{request()->is('admin/orders/status/pending')?'active':''}}">
                                {{ trans_admin('pending') }}</a></li>
                    </ul>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.orders.get-by-status', 'confirmed') }}"
                               class="slide-item {{request()->is('admin/orders/status/confirmed')?'active':''}}">
                                {{ trans_admin('confirmed') }}</a></li>
                    </ul>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.orders.get-by-status', 'packaging') }}"
                               class="slide-item {{request()->is('admin/orders/status/packaging')?'active':''}}">
                                {{ trans_admin('packaging') }}</a></li>
                    </ul>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.orders.get-by-status', 'out_for_delivery') }}"
                               class="slide-item {{request()->is('admin/orders/status/out_for_delivery')?'active':''}}">
                                {{ trans_admin('out_for_delivery') }}</a></li>
                    </ul>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.orders.get-by-status', 'delivered') }}"
                               class="slide-item {{request()->is('admin/orders/status/delivered')?'active':''}}">
                                {{ trans_admin('delivered') }}</a></li>
                    </ul>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.orders.get-by-status', 'returned') }}"
                               class="slide-item {{request()->is('admin/orders/status/returned')?'active':''}}">
                                {{ trans_admin('returned') }}</a></li>
                    </ul>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.orders.get-by-status', 'failed_to_deliver') }}"
                               class="slide-item {{request()->is('admin/orders/status/failed_to_deliver')?'active':''}}">
                                {{ trans_admin('failed_to_deliver') }}</a></li>
                    </ul>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.orders.get-by-status', 'canceled') }}"
                               class="slide-item {{request()->is('admin/orders/status/canceled')?'active':''}}">
                                {{ trans_admin('canceled') }}</a></li>
                    </ul>
                </li> --}}
            </ul>
            <div style="height: 100px;"></div>
            <div class="slide-right" id="slide-right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                     width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/>
                </svg>
            </div>
        </div>
    </div>
    <!--/APP-SIDEBAR-->
</div>
