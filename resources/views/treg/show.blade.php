@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h3>Daftar Gedung {{ $treg->formatted_name }}</h3>

            <building-list :data='@json($assets)'></building-list>
        </div>
    </div>
</div>
@endsection
