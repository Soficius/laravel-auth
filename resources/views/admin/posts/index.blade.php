@extends('layouts.app')
@section('content')
    {{-- conferma dell'eliminazione di un comic --}}
    @if (session('delete'))
        <div class="green border rounded bg-white p-1 width-400">{{ session('delete') }}</div>
    @endif
    <header>
        <h1 class="text-center">Lista Posts</h1>
    </header>
    <table class="table mt-2 container">
        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.posts.create') }}" class="btn btn-success mr-4">Crea Nuovo Post</a>
        </div>
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
                    <td> <img src="{{ $post->image }}" alt="" class="img-fluid"></td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at }}</td>
                    <td class="d-flex">
                        <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary mr-4">Vedi</a>
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning mr-4">Modifica
                            Post</a>
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
    {{-- conferma prima di eliminare un comic --}}
    @section('js')
        <script>
            const deleteForm = document.querySelectorAll('.delete-form');
            deleteForm.forEach(form => {
                form.addEventListener('submit', (event) => {
                    event.preventDefault();
                    const hasConfirmed = confirm('sei sicuro di eliminare questo comic?');
                    if (hasConfirmed) form.submit();
                });
            });
        </script>
    @endsection
@endsection
