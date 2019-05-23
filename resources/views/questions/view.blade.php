@extends('layouts.app')

@section('content')
    @php
        $tag = $question->getTag();
        $i = 0;
        $date = \Carbon\Carbon::parse($question->created_at)->setTimezone('Europe/Amsterdam');
    @endphp
    <div class="container px-5 justify-content-center">
        <div class="card mb-5 shadow-sm">
            <div class="card-header">
                @if($tag)
                    <h5><span class="badge float-right"
                              style="background-color: {{ $tag->hex }}">{{ $tag->name }}</span></h5>
                @endif
                <h3>Vraag #{{ $question->id }}</h3>
            </div>
            <div class="card-body">
                {!! $question->content !!}
            </div>
            <div class="card-footer">
                <p class="text-right text-muted font-italic float-right">
                    Geplaatst: {{ $date->isToday() ? 'vandaag om ' . $date->isoFormat('H:mm') : $date->isoFormat('lll')  }}
                </p>
                @if($question->isOpen() && Auth::check())
                    <a class="btn btn-primary mr-2" data-toggle="collapse" href="#answer-question" role="button"
                       aria-expanded="false" aria-controls="answer-question">Beantwoorden</a>
                    <div class="collapse" id="answer-question">
                        <div class="mt-3">
                            <form action="{{ route('answer.store', ['question' => $question->id]) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="answer">Antwoord:</label>
                                    <textarea name="content" id="answer" cols="30" rows="10"
                                              class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}"></textarea>
                                    @if($errors->has('content'))
                                        <div class="invalid-feedback">
                                            {!! $errors->get('content')[0] !!}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-outline-success">Plaatsen</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        @foreach($question->getAnswers() as $answer)
            @php
                $date = \Carbon\Carbon::parse($answer->created_at)->setTimezone('Europe/Amsterdam');
                $i++;
            @endphp
            <div class="card mb-2 shadow-sm">
                <div class="card-header">
                    <h4>Antwoord #{{ $i }}</h4>
                </div>
                <div class="card-body">
                    {{ $answer->content }}
                </div>
                <div class="card-footer">
                    <p class="text-right text-muted font-italic float-right">
                        Geplaatst: {{ $date->isToday() ? 'vandaag om ' . $date->isoFormat('H:mm') : $date->isoFormat('lll')  }}
                    </p>
                    <p>Geplaatst door: {{ $answer->getAuthor()->name }}</p>
                </div>
            </div>
        @endforeach
        {{--<div class="card mb-2 shadow-sm">--}}
        {{--<div class="card-header">--}}
        {{--<h4>Vraag #2</h4>--}}
        {{--</div>--}}
        {{--<div class="card-body">--}}
        {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquam assumenda dolor hic quae rem--}}
        {{--tempora. Consequatur doloribus exercitationem saepe?--}}
        {{--</div>--}}
        {{--<div class="card-footer">--}}
        {{--<p class="text-right text-muted font-italic float-right">--}}
        {{--Geplaatst: vandaag 17:24--}}
        {{--</p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="card mb-2 shadow-sm">--}}
        {{--<div class="card-header">--}}
        {{--<h4>Antwoord #2</h4>--}}
        {{--</div>--}}
        {{--<div class="card-body">--}}
        {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, asperiores aspernatur deserunt dolore--}}
        {{--doloribus ea eum fuga impedit itaque laborum magnam molestias nam necessitatibus omnis placeat--}}
        {{--repellendus saepe veritatis vero!--}}
        {{--</div>--}}
        {{--<div class="card-footer">--}}
        {{--<a href="#" class="btn btn-primary mr-2">Ik heb nog een vraag</a>--}}
        {{--<a href="#" class="btn btn-success">Mijn vraag is beantwoord</a>--}}
        {{--<p class="text-right text-muted font-italic float-right">--}}
        {{--Geplaatst: vandaag 17:33--}}
        {{--</p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<hr>--}}
        {{--<h2>Voorbeeld kaarten</h2>--}}
        {{--<div class="card mb-2 shadow-sm">--}}
        {{--<div class="card-header">--}}
        {{--<h4>Antwoord #2</h4>--}}
        {{--</div>--}}
        {{--<div class="card-body">--}}
        {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, asperiores aspernatur deserunt dolore--}}
        {{--doloribus ea eum fuga impedit itaque laborum magnam molestias nam necessitatibus omnis placeat--}}
        {{--repellendus saepe veritatis vero!--}}
        {{--</div>--}}
        {{--<div class="card-footer">--}}
        {{--<a class="btn btn-primary mr-2" data-toggle="collapse" href="#ask-question" role="button"--}}
        {{--aria-expanded="false" aria-controls="ask-question">Ik heb nog een vraag</a>--}}
        {{--<a href="#" class="btn btn-success">Mijn vraag is beantwoord</a>--}}
        {{--<p class="text-right text-muted font-italic float-right">--}}
        {{--Geplaatst: vandaag 17:33--}}
        {{--</p>--}}
        {{--<div class="collapse" id="ask-question">--}}
        {{--<div class="mt-3">--}}
        {{--<form action="" method="POST">--}}
        {{--@csrf--}}
        {{--<div class="form-group">--}}
        {{--<label for="question">Vraag:</label>--}}
        {{--<textarea name="content" id="question" cols="30" rows="10"--}}
        {{--class="form-control"></textarea>--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
        {{--<button class="btn btn-outline-success">Vraag stellen</button>--}}
        {{--</div>--}}
        {{--</form>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="card mb-2 shadow-sm">--}}
        {{--<div class="card-header">--}}
        {{--<h4>Vraag #2</h4>--}}
        {{--</div>--}}
        {{--<div class="card-body">--}}
        {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, asperiores aspernatur deserunt dolore--}}
        {{--doloribus ea eum fuga impedit itaque laborum magnam molestias nam necessitatibus omnis placeat--}}
        {{--repellendus saepe veritatis vero!--}}
        {{--</div>--}}
        {{--<div class="card-footer">--}}
        {{--<a class="btn btn-success mr-2" data-toggle="collapse" href="#answer-question" role="button"--}}
        {{--aria-expanded="false" aria-controls="answer-question">Beantwoorden</a>--}}
        {{--<p class="text-right text-muted font-italic float-right">--}}
        {{--Geplaatst: vandaag 17:33--}}
        {{--</p>--}}
        {{--<div class="collapse" id="answer-question">--}}
        {{--<div class="mt-3">--}}
        {{--<form action="" method="POST">--}}
        {{--@csrf--}}
        {{--<div class="form-group">--}}
        {{--<label for="answer">Antwoord:</label>--}}
        {{--<textarea name="content" id="answer" cols="30" rows="10"--}}
        {{--class="form-control"></textarea>--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
        {{--<button class="btn btn-outline-success">Plaatsen</button>--}}
        {{--</div>--}}
        {{--</form>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
    </div>
@endsection
