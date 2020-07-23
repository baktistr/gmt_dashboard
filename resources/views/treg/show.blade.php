@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <building-list :data='@json($assets)'></building-list>
        </div>
    </div>
</div>
@endsection
