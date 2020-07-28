@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <strong>Telkom Regional</strong>
                            </div>
                            <div class="card-body p-1">
                                <img src="{{ asset('map.png') }}" class="img-fluid" alt="">
                                <div class="row">
                                    <div class="col pr-1">
                                        <div class="c-callout mb-1 px-1" style="border-left-color: #bf6e6a">
                                            <strong><small class="text-muted">TREG 1</small></strong>
                                        </div>
                                    </div>
                                    <div class="col pr-1">
                                        <div class="c-callout mb-1 px-1" style="border-left-color: #8053f5">
                                            <strong><small class="text-muted">TREG 2</small></strong>
                                        </div>
                                    </div>
                                    <div class="col pr-1">
                                        <div class="c-callout mb-1 px-1" style="border-left-color: #c0a683">
                                            <strong><small class="text-muted">TREG 3</small></strong>
                                        </div>
                                    </div>
                                    <div class="col pr-1">
                                        <div class="c-callout mb-1 px-1" style="border-left-color: #ef58f3">
                                            <strong><small class="text-muted">TREG 4</small></strong>
                                        </div>
                                    </div>
                                    <div class="col pr-1">
                                        <div class="c-callout mb-1 px-1" style="border-left-color: #90a2bc">
                                            <strong><small class="text-muted">TREG 5</small></strong>
                                        </div>
                                    </div>
                                    <div class="col pr-1">
                                        <div class="c-callout mb-1 px-1" style="border-left-color: #c7d0a5">
                                            <strong><small class="text-muted">TREG 6</small></strong>
                                        </div>
                                    </div>
                                    <div class="col pr-1">
                                        <div class="c-callout mb-1 px-1" style="border-left-color: #c4a7ea">
                                            <strong><small class="text-muted">TREG 7</small></strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <treg-chart label="Gedung" :height="115"></treg-chart>
                    </div>
                    <div class="col">
                        <treg-chart label="Lahan" :height="115"></treg-chart>
                    </div>
                </div>
{{--                <div class="row">--}}
{{--                    <div class="col">--}}
{{--                        <total-user--}}
{{--                            :total-users="{{ $totalUsers }}"--}}
{{--                            :label='@json($totalUsersLabel)'--}}
{{--                            :data='@json($totalUsersData)'--}}
{{--                        ></total-user>--}}
{{--                    </div>--}}
{{--                    <div class="col">--}}
{{--                        <total-space-booked></total-space-booked>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <div class="col">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card card-accent-info text-info">
                            <div class="card-body">
                                <div class="text-muted text-right position-absolute mr-4" style="right: 0">
                                    <svg class="c-icon c-icon-2xl text-info">
                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-building"></use>
                                    </svg>
                                </div>
                                <h3>2.350</h3>
                                <div class="text-muted text-uppercase font-weight-bold">Total Gedung</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card card-accent-primary text-primary">
                            <div class="card-body">
                                <div class="text-muted text-right position-absolute mr-4" style="right: 0">
                                    <svg class="c-icon c-icon-2xl text-primary">
                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-map"></use>
                                    </svg>
                                </div>
                                <h3>285</h3>
                                <div class="text-muted text-uppercase font-weight-bold">Total Lahan</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card card-accent-danger text-danger">
                            <div class="card-body">
                                <div class="text-muted text-right position-absolute mr-4" style="right: 0">
                                    <svg class="c-icon c-icon-2xl text-danger">
                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-map"></use>
                                    </svg>
                                </div>
                                <h3>{{ $tregList->count() }}</h3>
                                <div class="text-muted text-uppercase font-weight-bold">Lahan Bersertifikat</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card card-accent-success text-success">
                            <div class="card-body">
                                <div class="text-muted text-right position-absolute mr-4" style="right: 0">
                                    <svg class="c-icon c-icon-2xl text-success">
                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-map"></use>
                                    </svg>
                                </div>
                                <h3>8.750</h3>
                                <div class="text-muted text-uppercase font-weight-bold">Lahan Tanpa Sertifikat</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col">
                                <commercial-space></commercial-space>
                            </div>
                        </div>
{{--                        <div class="row">--}}
{{--                            <div class="col-sm-6">--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <div class="text-value-lg">2.450</div>--}}
{{--                                        <div>Available Spaces</div>--}}
{{--                                        <div class="progress progress-xs my-2">--}}
{{--                                            <div class="progress-bar bg-success" role="progressbar" style="width: 78%"--}}
{{--                                                 aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                        <small class="text-muted">78% from total commercial spaces</small>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-6">--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <div class="text-value-lg">760</div>--}}
{{--                                        <div>Total Spaces Booked</div>--}}
{{--                                        <div class="progress progress-xs my-2">--}}
{{--                                            <div class="progress-bar bg-info" role="progressbar" style="width: 90%" aria-valuenow="90"--}}
{{--                                                 aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                        <small class="text-muted">90% from total available spaces</small>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-6">--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <div class="text-value-lg">760</div>--}}
{{--                                        <div>Unavailable Spaces</div>--}}
{{--                                        <div class="progress progress-xs my-2">--}}
{{--                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 22%" aria-valuenow="22"--}}
{{--                                                 aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                        <small class="text-muted">22% from total commercial spaces</small>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
  import CommercialSPace from "../js/components/CommercialSpace";
  import CommercialSpace from "../js/components/CommercialSpace";
  export default {
    components: {CommercialSpace, CommercialSPace}
  }
</script>
