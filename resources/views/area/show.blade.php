@extends('layouts.app')

@section('title')
    {{ $area->name }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <building-list :data='@json($buildings)'></building-list>
        </div>
    </div>
</div>
@endsection
