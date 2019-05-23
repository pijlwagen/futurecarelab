@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
            {{ $recent }}
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Recente vragen</h4>
                    </div>
                    <div class="card-body">
                        @foreach($recent as $item)
                            <a href="{{ route('question.view', ['id' => $item->id]) }}">Vraag #{{ $item->id }}</a>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
