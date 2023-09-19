    @extends('admin.layouts.main')
        {{-- content --}}
        @section('content')
        <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        {{-- <h5 class="card-title mb-0">Latest Projects</h5> --}}
                        <div class="row">
                            <div class="col-3">
                                <div class="card">
                                    <div class="card-body kotak bg-info text-center text-white">
                                        <div class="title">Penjualan Hari ini</div>
                                        <div class="dalamkotak">
                                        <div class="rp">Rp. {{ number_format($total) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card">
                                    <div class="card-body kotak bg-success text-center text-white">
                                        <div class="title">Laba Hari ini</div>
                                        <div class="dalamkotak">
                                        <div class="rp">Rp. {{ number_format($laba) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        {{-- end content --}}

				