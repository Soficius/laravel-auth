@extends('layouts.app')
@section('content')
    <header>
        <h1 class="text-center">Crea un nuovo post</h1>
    </header>
    <main class="container">
        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">title</label>
                <input type="text" class="form-control" id="title" placeholder="title" name="title"
                    value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="url "> URL del image: </label>
                <input type="url" name="image" class="form-control" id="url" placeholder="URL del comic"
                    value="{{ old('image') }}">
            </div>
            <div class="form-group">
                <label for="contenut">contenuto</label>
                <textarea class="form-control" id="contenut" rows="3" name="content">{{ old('content') }}</textarea>
            </div>
            <div class="form-group">
                <label for="category_id">Categoria</label>
                <select class="form-control" id="category_id" name="category_id">
                    <option>Nessuna Categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->label }}">{{ $category->label }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-success">Salva</button>
            </div>
        </form>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-primary mr-4 mt-2">Torna indietro</a>
    </main>
@endsection
