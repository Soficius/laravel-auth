@extends('layouts.app')
@section('content')
    <header>
        <h1>Posts</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Autore</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Creato il</th>
                    <th scope="col">Modificato il</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>
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
