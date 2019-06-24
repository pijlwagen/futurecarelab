@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card card-body">
            <form action="" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Naam</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}">
                </div>
                <div class="form-group">
                    <label for="color">Kleur</label>
                    <input type="color" class="form-control" name="color" id="color" value="{{ $category->hex }}">
                </div>
                <a href="javascript:history.back();" class="btn btn-primary">Terug</a>
                <button class="btn btn-primary float-right">Opslaan</button>
            </form>
        </div>
    </div>
@endsection
