@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('admin.cat.create') }}" class="btn btn-primary float-right mb-3">Categorie Toevoegen</a>
        <table class="table table-responsive-md table-striped">
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>Kleur code</th>
                <th>Acties</th>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <th>{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td><pre style="color: {{ $category->hex }}; background: #222; padding: 5px; border-radius: 5px;">{{ $category->hex }}</pre></td>
                    <td><a href="{{ route('admin.cat.edit', ['id' => $category->id]) }}" class="text-warning mr-2">Aanpassen</a> <a href="{{ route('admin.cat.delete', ['id' => $category->id]) }}" class="text-danger mr-2">Verwijderen</a></td>
                </tr>
            @endforeach
        </table>
        {{ $categories->links() }}
    </div>
@endsection
