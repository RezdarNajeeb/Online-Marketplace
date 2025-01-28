@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold text-center mb-6">{{ auth()->user()->name }}</h1>
@endsection
