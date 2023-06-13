@extends('layouts.admin')

@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <h1>{{ $project->title }}</h1>
    <h6>Category: {{ $project->category ? $project->category->name : 'Senza categoria' }}</h6>
    {{-- <img src="{{ $project->image }}" alt="{{ $project->title }}"> --}}
    <p>{!! $project->description !!}</p>
@endsection
