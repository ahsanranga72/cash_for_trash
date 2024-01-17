@extends('adminmodule::layouts.master')

@section('page_title', 'Admin dashboard')

@push('page_css')
@endpush

@section('main_content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    <h6 class="">Total users</h6>
                                    <h2 class="mb-0 number-font">{{ $users->count() }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    <h6 class="">Total customer</h6>
                                    <h2 class="mb-0 number-font">{{ $users->where('user_type', CUSTOMER)->count() }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    <h6 class="">Total agent</h6>
                                    <h2 class="mb-0 number-font">{{ $users->where('user_type', AGENT)->count() }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    <h6 class="">Total orders</h6>
                                    <h2 class="mb-0 number-font">{{ $orders->count() }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    <h6 class="">Order pending</h6>
                                    @php
                                        $pending = $orders->where('status', 'pending')->count();
                                    @endphp
                                    <h2 class="mb-0 number-font">{{ $pending }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    <h6 class="">Order processing</h6>
                                    @php
                                        $processing = $orders->where('status', 'processing')->count();
                                    @endphp
                                    <h2 class="mb-0 number-font">{{ $processing }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    <h6 class="">Order completed</h6>
                                    @php
                                        $completed = $orders->where('status', 'completed')->count();
                                    @endphp
                                    <h2 class="mb-0 number-font">{{ $completed }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    <h6 class="">Order cancelled</h6>
                                    @php
                                        $cancelled = $orders->where('status', 'cancelled')->count();
                                    @endphp
                                    <h2 class="mb-0 number-font">{{ $cancelled }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    <h6 class="">Order postponed</h6>
                                    @php
                                        $postponed = $orders->where('status', 'postponed')->count();
                                    @endphp
                                    <h2 class="mb-0 number-font">{{ $postponed }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent orders</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-lg">
                        <table class="table border-top table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">Sl</th>
                                    <th class="text-center">Customer</th>
                                    <th class="text-center">Agent</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $key => $item)
                                    <tr>
                                        <td class="align-middle text-center">
                                            {{ ($orders->currentPage() - 1) * $orders->perPage() + $key + 1 }}</td>
                                        <td class="text-nowrap align-middle">{{ $item->customer->first_name }}</td>
                                        <td class="text-nowrap align-middle">{{ $item->agent->first_name ?? 'N/A' }}
                                        </td>
                                        <td class="text-nowrap align-middle">
                                            <div class="mt-sm-1 d-flex justify-content-center">
                                                <span
                                                    class="badge bg-success-transparent rounded-pill text-success p-2 px-3 text-capitalize">{{ $item->status }}</span>
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="g-2">
                                                <a class="btn text-primary btn-sm" data-bs-toggle="tooltip"
                                                    data-bs-original-title="Details"
                                                    href="{{ route('admin.order-show', $item['id']) }}"><span
                                                        class="fe fe-eye fs-14"></span></a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center align-middle"
                                            style="padding: 3rem 0 !important;">
                                            Nothing to show !</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-end">
                        {!! $orders->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
