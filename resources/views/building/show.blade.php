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
    
    //Convert 2D array To Single
    $spaceAvailableData   = array_column($availableSpace , 'data');
    $spaceAvailableLabels = array_column($availableSpace , 'lables');
    // Unvavailable Space Data
    $spaceUnAvailableData   = array_column($unAvailableChart , 'data');
    $spaceUnAvailableLabels = array_column($unAvailableChart , 'lables');

@endphp


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col">
                        <div class="card card-accent-primary">
                            <div class="card-header">Complaints Statistic {{ date('Y') }}</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <!-- /.col-->
                                            <div class="col-3">
                                                <div class="c-callout c-callout-danger mt-0">
                                                    <small class="text-muted">Pending</small>
                                                    <div class="text-value-lg">{{ $complaints['totalPending'] }}</div>
                                                </div>
                                            </div>
                                            <!-- /.col-->
                                            <div class="col-3">
                                                <div class="c-callout c-callout-info mt-0">
                                                    <small class="text-muted">On Progress</small>
                                                    <div class="text-value-lg">{{ $complaints['totalInProgress'] }}</div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="c-callout c-callout-success mt-0">
                                                    <small class="text-muted">Done</small>
                                                    <div class="text-value-lg">{{ $complaints['totalDone'] }}</div>
                                                </div>
                                            </div>
                                            <!-- /.col-->
                                            <div class="col-3">
                                                <div class="c-callout c-callout-primary mt-0">
                                                    <small class="text-muted">Total</small>
                                                    <div class="text-value-lg">{{ $complaints['total'] }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.row-->

                                        <hr class="mt-0">

                                        @foreach($complaints['data'] as $complaint)
                                            <div class="d-flex">
                                                <div class="flex-grow-1 progress-group @if(!$loop->last)mb-2 @else mb-0 @endif">
                                                    <div class="progress-group-prepend">
                                                        <span class="progress-group-text">{{$complaint['label']}}</span>
                                                    </div>
                                                    <div class="progress-group-bars">
                                                        <div class="progress">
                                                            <div
                                                                class="progress-bar bg-gradient-danger"
                                                                role="progressbar"
                                                                style="width: {{ $complaint['status']['pending']['percentage'] }}%"
                                                                aria-valuenow="{{ $complaint['status']['pending']['total'] }}"
                                                                aria-valuemin="0"
                                                                aria-valuemax="{{ $complaint['status']['totalComplaints'] }}"
                                                            >
                                                                {{ $complaint['status']['pending']['total'] }}
                                                            </div>

                                                            <div
                                                                class="progress-bar bg-info progress-bar-striped progress-bar-animated"
                                                                role="progressbar"
                                                                style="width: {{ $complaint['status']['in-progress']['percentage'] }}%"
                                                                aria-valuenow="{{ $complaint['status']['in-progress']['total'] }}"
                                                                aria-valuemin="0"
                                                                aria-valuemax="{{ $complaint['status']['totalComplaints'] }}"
                                                            >
                                                                {{ $complaint['status']['in-progress']['total'] }}
                                                            </div>

                                                            <div
                                                                class="progress-bar bg-gradient-success"
                                                                role="progressbar"
                                                                style="width: {{ $complaint['status']['done']['percentage'] }}%"
                                                                aria-valuenow="{{ $complaint['status']['done']['total'] }}"
                                                                aria-valuemin="0"
                                                                aria-valuemax="{{ $complaint['status']['totalComplaints'] }}"
                                                            >
                                                                {{ $complaint['status']['done']['total'] }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <span class="ml-1" style="width: 30px;">{{ $complaint['status']['totalComplaints'] }}</span>
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
                                <h3>{{ $building->spaces()->available()->count() }}</h3>
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
                                <h3>{{ $building->spaces()->count() }}</h3>
                                <div class="text-muted text-uppercase font-weight-bold">Total Spaces</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <bar-chart-widget
                            title="Space Available"
                            chart-id="space-available"
                            :labels='@json($spaceAvailableLabels)'
                            :data='@json($spaceAvailableData)'
                            color="primary"
                            bar-color="#2ecc71" 
                            :height="100"
                        ></bar-chart-widget>
                    </div>
                    {{-- <div class="col-sm-6">
                        <bar-chart-widget
                            title="Space Booked"
                            chart-id="space-booked"
                            :labels='@json($months)'
                            :data='@json($barData->shuffle()->all())'
                            color="primary"
                            bar-color="#3498db"
                            :height="100"
                        ></bar-chart-widget>
                    </div> --}}
                    <div class="col-sm-12">
                        <bar-chart-widget
                            title="Space Unavailable"
                            chart-id="space-unavailable"
                            :labels='@json($spaceUnAvailableData)'
                            :data='@json($spaceUnAvailableData)'
                            color="primary"
                            bar-color="#e74c3c"
                            :height="100"
                        ></bar-chart-widget>
                    </div>
                    {{-- <div class="col-sm-6">
                        <bar-chart-widget
                            title="Total Users"
                            chart-id="total-users"
                            :labels='@json($months)'
                            :data='@json($barData->shuffle()->all())'
                            color="primary"
                            bar-color="#9b59b6"
                            :height="100"
                        ></bar-chart-widget>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <gauge-chart
                    chart-id="electricity-consumption"
                    title="Electricity Consumption"
                    unit="KWh"
                    :value={{ $electricityConsumption }}
                ></gauge-chart>
            </div>
            <div class="col-sm-3">
                <gauge-chart
                    chart-id="water-consumption"
                    title="Water Consumption"
                    unit="m3"
                    :value="{{$waterConsumptions}}"
                ></gauge-chart>
            </div>
            <div class="col-sm-3">
                <gauge-chart
                    chart-id="fuel-consumption"
                    title="Fuel Consumption"
                    unit="liter"
                    :value="{{ $fuel }}"
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
