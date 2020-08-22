@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <strong>Telkom Regional</strong>
                    </div>
                    <div class="card-body p-1">
                        <indonesia :tregs='@json($tregs)'></indonesia>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
