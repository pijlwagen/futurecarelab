@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong>Open vragen</strong>
                    </div>
                    <div class="card-body">
                        @foreach($questions as $question)
                            <a href="{{ route('question.view', ['id' => $question->id]) }}">Vraag
                                #{{ $question->id }}</a><br>
                            <small class="text-muted font-italic">{{ \Illuminate\Support\Str::limit($question->content, 30) }}</small>
                            <hr>
                        @endforeach
                        {{ $questions->links() }}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <strong>Recente vragen</strong>
                    </div>
                    <div class="card-body">
                        @foreach($recent as $item)
                            @php($tag = $item->getTag())
                        {{ $item }}
                            <a href="{{ route('question.view', ['id' => $item->id]) }}">Vraag #{{ $item->id }} @if($tag)
                                    <span
                                            class="badge float-right"
                                            style="background-color: {{ $tag->hex }};color:#fff;">{{ $tag->name}}</span>@endif
                            </a>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
