@extends('layouts.app')

@section('title')
    {{ $treg->name }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <area-list :data='@json($area)'></area-list>
        </div>
    </div>
</div>
@endsection
