@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="">
            <p>Typ uw email adres om uw vragen te zien</p>
            <div class="form-group row">
                <div class="col-md-9 mb-3">
                    <input type="email" name="email" id="email" placeholder="voorbeeld@domein.nl" class="form-control" value="{{ $email }}">
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary w-100">Zoeken</button>
                </div>
            </div>
        </form>
        <hr>
        <table class="table table-responsive-md w-100">
            <tr>
                <th>Vraag nummer</th>
                <th>Categorie</th>
                <th>Status</th>
                <th>Geplaatst op</th>
                <th>Acties</th>
            </tr>
            @foreach($questions as $question)
                <tr>
                    <td>{{ $question->id }}</td>
                    <td>{{ $question->getCategory()->name ?? 'Cat. is verwijderd' }}</td>
                    <td>{{ $question->getTag()->name }}</td>
                    <td>{{ $question->created_at }}</td>
                    <td><a href="{{ route('question.view', ['id' => $question->id]) }}">Bekijken</a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
