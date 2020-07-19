@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <treg-chart></treg-chart>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card text-white bg-gradient-danger">
                            <div class="card-body">
                                <div class="text-muted text-right mb-4">
                                    <svg class="c-icon c-icon-2xl">
                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-globe-alt"></use>
                                    </svg>
                                </div>
                                <div class="text-value-lg">{{ $tregList->count() }}</div>
                                <small class="text-muted text-uppercase font-weight-bold">Total Regionals</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card text-white bg-primary">
                            <div class="card-body">
                                <div class="text-muted text-right mb-4">
                                    <svg class="c-icon c-icon-2xl">
                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-map"></use>
                                    </svg>
                                </div>
                                <div class="text-value-lg">385</div>
                                <small class="text-muted text-uppercase font-weight-bold">Total Area</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card text-white bg-info">
                            <div class="card-body">
                                <div class="text-muted text-right mb-4">
                                    <svg class="c-icon c-icon-2xl">
                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-building"></use>
                                    </svg>
                                </div>
                                <div class="text-value-lg">87.500</div>
                                <small class="text-muted text-uppercase font-weight-bold">Total Buildings</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card text-white bg-success">
                            <div class="card-body">
                                <div class="text-muted text-right mb-4">
                                    <svg class="c-icon c-icon-2xl">
                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-room"></use>
                                    </svg>
                                </div>
                                <div class="text-value-lg">385</div>
                                <small class="text-muted text-uppercase font-weight-bold">Total Spaces</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5">
                <div class="row">
                    <div class="col">
                        <total-user></total-user>
                    </div>
                    <div class="col">
                        <total-space-booked></total-space-booked>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-value-lg">2.450</div>
                                <div>Available Spaces</div>
                                <div class="progress progress-xs my-2">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 78%"
                                         aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small class="text-muted">78% from total commercial spaces</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-value-lg">760</div>
                                <div>Unavailable Spaces</div>
                                <div class="progress progress-xs my-2">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 22%" aria-valuenow="22"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small class="text-muted">22% from total commercial spaces</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-value-lg">760</div>
                                    <div>Total Spaces Booked</div>
                                    <div class="progress progress-xs my-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 90%" aria-valuenow="90"
                                             aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small class="text-muted">90% from total available spaces</small>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col">
                <witel-chart></witel-chart>
            </div>
        </div>
    </div>
@endsection
