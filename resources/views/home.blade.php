@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('question.store') }}" method="POST">
                    @csrf
                    <div class="form-group text-center">
                        <h2>Stel uw vraag!</h2>
                        <p>Typ uw vraag in het tekst veld hier beneneden en klik op de blauwe knop.</p>
                    </div>
                    <div class="form-group">
                        <textarea name="question" id="question" cols="30" rows="10"
                                  class="form-control{{ $errors->has('question') ? ' is-invalid' : '' }}">{{ old('question') }}</textarea>
                        @if($errors->has('question'))
                            <div class="invalid-feedback">
                                {!! $errors->get('question')[0] !!}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary float-right">Vraag stellen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
