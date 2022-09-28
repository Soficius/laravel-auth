@extends('layouts.app')
@section('content')
    <header>
        <div class="d-flex justify-content-center">
            <a href="{{ route('admin.posts.create') }}" class="btn btn-success mr-4">Crea Nuovo Post</a>
        </div>
    </header>
    <main class="justify-content-center d-flex mt-5">
        <div class="card mb-3 -flex justify-content-center" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-100 h-100">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->content }}</p>
                        {{-- l'if mi permette di non spaccare il codice se nel post non è presente nessuna categoria --}}
                        <p>Categoria:
                            @if ($post->category)
                                {{ $post->category->label }}
                            @else
                                Nessuna
                            @endif
                        </p>
                        <p>Creato il<time> {{ $post->created_at }} </time></p>
                        <p>Modificato il<time> {{ $post->updated_at }} </time> </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="justify-content-center d-flex">
        <a href="{{ route('admin.posts.index') }}" class="btn btn-primary mr-4">Torna indietro</a>
        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning mr-4">Modifica</a>
        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Elimina Post</button>
        </form>
    </footer>
@endsection
