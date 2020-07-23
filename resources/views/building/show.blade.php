@extends('layouts.app')

@section('title')
    {{ $building->name }}
@endsection

@php
    $months = array(
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July ',
        'August',
        'September',
        'October',
        'November',
        'December',
    );
    $barData = collect([1, 18, 9, 17, 34, 22, 11, 10, 87, 23, 50, 43]);
@endphp

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col">
                        <div class="card card-accent-primary">
                            <div class="card-header">Complaints</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="c-callout c-callout-success"><small
                                                            class="text-muted">Fixed</small>
                                                    <div class="text-value-lg">120</div>
                                                </div>
                                            </div>
                                            <!-- /.col-->
                                            <div class="col-4">
                                                <div class="c-callout c-callout-danger"><small
                                                            class="text-muted">On Progress</small>
                                                    <div class="text-value-lg">50</div>
                                                </div>
                                            </div>
                                            <!-- /.col-->
                                            <div class="col-4">
                                                <div class="c-callout c-callout-primary"><small
                                                            class="text-muted">Total</small>
                                                    <div class="text-value-lg">2.300</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.row-->
                                        <hr class="mt-0">
                                        @foreach($months as $month)
                                            <div class="progress-group @if(!$loop->last)mb-2 @else mb-0 @endif">
                                                <div class="progress-group-prepend"><span
                                                            class="progress-group-text">{{ $month }}</span></div>
                                                <div class="progress-group-bars">
                                                    <div class="progress progress-xs">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ random_int(10, 100) }}%"
                                                             aria-valuenow="{{ random_int(10, 100) }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <div class="progress progress-xs">
                                                        <div class="progress-bar bg-danger" role="progressbar"
                                                             style="width: {{ random_int(10, 100) }}%" aria-valuenow="{{ random_int(10, 100) }}" aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- /.col-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card card-accent-primary text-success">
                            <div class="card-body">
                                <div class="text-muted text-right position-absolute mr-4" style="right: 0">
                                    <svg class="c-icon c-icon-2xl text-success">
                                        <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-room"></use>
                                    </svg>
                                </div>
                                <h3>8.750</h3>
                                <div class="text-muted text-uppercase font-weight-bold">Available Spaces</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card card-accent-primary text-primary">
                            <div class="card-body">
                                <div class="text-muted text-right position-absolute mr-4" style="right: 0">
                                    <svg class="c-icon c-icon-2xl text-primary">
                                        <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-room"></use>
                                    </svg>
                                </div>
                                <h3>8.750</h3>
                                <div class="text-muted text-uppercase font-weight-bold">Total Spaces</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <bar-chart-widget
                            title="Space Available"
                            chart-id="space-available"
                            :labels='@json($months)'
                            :data='@json($barData->shuffle()->all())'
                            color="primary"
                            bar-color="#2ecc71"
                            :height="100"
                        ></bar-chart-widget>
                    </div>
                    <div class="col-sm-6">
                        <bar-chart-widget
                            title="Space Booked"
                            chart-id="space-booked"
                            :labels='@json($months)'
                            :data='@json($barData->shuffle()->all())'
                            color="primary"
                            bar-color="#3498db"
                            :height="100"
                        ></bar-chart-widget>
                    </div>
                    <div class="col-sm-6">
                        <bar-chart-widget
                            title="Space Unavailable"
                            chart-id="space-unavailable"
                            :labels='@json($months)'
                            :data='@json($barData->shuffle()->all())'
                            color="primary"
                            bar-color="#e74c3c"
                            :height="100"
                        ></bar-chart-widget>
                    </div>
                    <div class="col-sm-6">
                        <bar-chart-widget
                            title="Total Users"
                            chart-id="total-users"
                            :labels='@json($months)'
                            :data='@json($barData->shuffle()->all())'
                            color="primary"
                            bar-color="#9b59b6"
                            :height="100"
                        ></bar-chart-widget>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <gauge-chart
                    chart-id="electricity-consumption"
                    title="Electricity Consumption"
                    unit="KWh"
                    :value="35000"
                ></gauge-chart>
            </div>
            <div class="col-sm-3">
                <gauge-chart
                    chart-id="water-consumption"
                    title="Water Consumption"
                    unit="m3"
                    :value="12000"
                ></gauge-chart>
            </div>
            <div class="col-sm-3">
                <gauge-chart
                    chart-id="fuel-consumption"
                    title="Fuel Consumption"
                    unit="liter"
                    :value="300"
                    :data='@json([600, 850, 1000])'
                ></gauge-chart>
            </div>
            <div class="col-sm-3">
                <div class="card card-accent-primary">
                    <div class="card-header">
                        Insurance
                    </div>
                    <div class="card-body">
                        <p class="text-center mb-2">
                            @if(true)
                                <i class="cil-check-circle display-1 text-success"></i>
                            @else
                                <i class="cil-x-circle display-1 text-danger"></i>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
