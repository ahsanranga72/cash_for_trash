@extends('frontendmodule::layouts.master')

@section('content')
    <!--/ Header end -->
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('assets/frontend-module') }}/images/web/banner.png)">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title" style="color: #ff9800">Products rate</h1>
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->

    <section id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a class="btn btn-lg btn-success float-right" href="{{ route('customer.sell-request') }}">Procced to checkout</a>
                </div>
            </div>
            @forelse ($categories as $category)
                <div class="row mt-5">
                    <div class="col-12 text-center mb-3">
                        <h2 class="section-title" style="font-size: 30px; font-weight: 800;">{{ $category['name'] }}</h2>
                    </div>
                    @forelse ($category->products as $product)
                        <div class="col-lg-4 col-md-6">

                            <div class="ts-pricing-box">
                                <div class="text-center display-1 text"><i class="fas fa-newspaper"></i></div>
                                <div class="ts-pricing-header">
                                    <h2 class="ts-pricing-name">{{ $product['name'] }}</h2>
                                    <h2 class="ts-pricing-price">
                                        <span
                                            class="currency">$</span><strong>{{ $product['price'] }}</strong><small>/KG</small>
                                    </h2>
                                </div><!-- Pricing header -->
                                <div class="plan-action mt-3" style="padding-bottom: 20px;">
                                    @if (auth()->check() && auth()->user()->user_type == CUSTOMER)
                                        <a href="javascript:void(0)" id="p-add-btn-{{ $product->id }}"
                                            onclick="product_added({{ $product->id }})"
                                            class="btn btn-primary {{ in_array($product->id, session('cart', [])) ? 'd-none' : '' }}">Add</a>
                                        <a href="javascript:void(0)" id="p-added-btn-{{ $product->id }}"
                                            class="btn btn-success {{ in_array($product->id, session('cart', [])) ? '' : 'd-none' }}"
                                            style="transition: all .3s ease">Added</a>
                                        <a href="javascript:void(0)" id="p-remove-btn-{{ $product->id }}"
                                            class="btn btn-warning {{ in_array($product->id, session('cart', [])) ? '' : 'd-none' }}"
                                            onclick="product_remove({{ $product->id }})"
                                            style="transition: all .3s ease">Remove</a>
                                    @else
                                        <a href="javascript:void(0)" onclick="login_alert()" class="btn btn-primary">Add</a>
                                    @endif
                                </div>
                            </div><!-- Plan 1 end -->
                        </div><!-- Col end -->
                    @empty
                        <div class="col-12">
                            <h2 class="section-title">Nothing to show !</h2>
                        </div>
                    @endforelse
                </div>
            @empty
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="section-title">Nothing to show !</h2>
                    </div>
                </div>
            @endforelse


        </div><!-- Conatiner end -->
    </section><!-- Main container end -->
@endsection

@push('js')
    <script>
        function product_added(p_id) {
            $("#p-add-btn-" + p_id).addClass('d-none')
            $("#p-added-btn-" + p_id).removeClass('d-none')
            $("#p-remove-btn-" + p_id).removeClass('d-none')

            $.ajax({
                type: 'POST',
                url: '{{ route('customer.add-to-cart') }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'product_id': p_id
                },
                success: function(data) {
                    if (data.success) {
                        toastr.success('Product successfully added');
                    } else {
                        toastr.error('Failed to add product.');
                    }
                },
                error: function() {
                    toastr.error('Error occurred.');
                }
            });
        }

        function product_remove(p_id) {
            $("#p-add-btn-" + p_id).removeClass('d-none')
            $("#p-added-btn-" + p_id).addClass('d-none')
            $("#p-remove-btn-" + p_id).addClass('d-none')

            $.ajax({
                type: 'POST',
                url: '{{ route('customer.remove-from-cart') }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'product_id': p_id
                },
                success: function(data) {
                    if (data.success) {
                        toastr.success('Product successfully removed.');
                    } else {
                        toastr.error('Failed to remove product.');
                    }
                },
                error: function() {
                    toastr.error('Error occurred.');
                }
            });
        }
    </script>
@endpush
