@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2>{{ $event->title }}</h2>
        </div>
        <div class="row">
            <p>{{ $event->date }}</p>
            <p>Biglietti disponibili: {{ $event->available_tickets }}</p>
            {{-- <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Modifica</a> --}}
            <a href="{{ route('admin.events.index') }}" class="btn btn-primary mt-3">Torna alla events list</a>

        </div>
    </div>
@endsection
