@extends('layouts.app')
@section('content')
    <header>
        <h1>Posts</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Immagine</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Creato il</th>
                    <th scope="col">Modificato il</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td> <img src="{{ $post->image }}" alt=""></td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>
                        <td class="d-flex">
                            <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary mr-4">Vedi</a>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Elimina Post</button>
                            </form>
                        </td>
                        <td></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <h4 class="text-center">Nessun Post</h4>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </header>
@endsection
