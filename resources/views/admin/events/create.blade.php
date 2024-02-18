@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Nuovo Progetto</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        name
        date
        available_tickets
        <div class="row">
            <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- title description thumb price series sale_date type --}}
                <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">date</label>

                    <input type="text" class="form-control @error('date') is-invalid @enderror" id="date"
                        name="date">
                    @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="img" class="form-label">Immagine dell'evento</label>
                    <input type="file" class="form-control @error('img') is-invalid @enderror" id="img"
                        name="img" placeholder="Inserisci l'immagine dell'evento" value="{{ old('img') }}">
                    @error('img')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="available_tickets" class="form-label">available_tickets</label>
                    <input type="text" class="form-control" id="available_tickets" name="available_tickets">
                </div>
                <div class="mb-3">
                    <label for="tag" class="form-label">Tag</label>
                    <select multiple name="tags[]" id="" class="form-select">
                        <option value="">nessun tag</option>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Inserisci</button>
            </form>
            <a href="{{ route('admin.events.index') }}" class="btn btn-warning">Torna alla sezione Eventi</a>
        </div>
    </div>
@endsection
