@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ciao {{Auth::user()->name}}!</h1>
</div>
@endsection
