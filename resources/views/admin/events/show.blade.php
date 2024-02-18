@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2>{{ $event->name }}</h2>
            @if ($event->img)
                <img src="{{ asset('storage/' . $event->img) }}" class="card-img-top w-50" alt="{{ $event->name }}">
            @endif
        </div>
        <div class="row">
            <p>{{ $event->date }}</p>
            <p>Biglietti disponibili: {{ $event->available_tickets }}</p>
            <h4>
                @if (count($event->tags) > 0)
                    <ul>
                        @foreach ($event->tags as $tag)
                            <li>#{{ $tag->name }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>No Tag #</p>
                @endif
            </h4>
            {{-- <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Modifica</a> --}}
            <a href="{{ route('admin.events.index') }}" class="btn btn-primary mt-3">Torna alla events list</a>

        </div>
    </div>
@endsection
