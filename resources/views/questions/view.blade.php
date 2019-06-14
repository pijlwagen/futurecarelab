@extends('layouts.app')

@section('content')
    @php
        $tag = $question->getTag();
        $category = $question->getCategory();
        $i = 0;
        $date = \Carbon\Carbon::parse($question->created_at)->setTimezone('Europe/Amsterdam');
    @endphp
    <div class="container px-5 justify-content-center">
        <div class="row mb-2">
            <div class="col">
                @if(Auth::check())
                    @if(Auth::user()->isAdmin())
                        <form action="{{ route('question.delete') }}" method="POST">
                            @csrf
                            <input type="text" name="id" readonly hidden value="{{ $question->id }}">
                            <button onclick="return confirm('Weet u zeker dat u deze vraag wilt verwijderen?')"
                                    class="ml-3 btn btn-danger float-right">Vraag verwijderen
                            </button>
                        </form>
                    @endif
                    @if($question->isOpen())
                        <a class="ml-3 btn btn-info float-right" href="#" data-toggle="modal"
                           data-target="#close-modal">
                            Vraag sluiten
                        </a>
                    @endif
                @endif
            </div>
        </div>
        <div class="card mb-5 shadow-sm">
            <div class="card-header">
                <h5>
                    @if($tag)
                        <span class="badge float-right"
                              style="background-color: {{ $tag->hex }};color:#fff;">{{ $tag->name }}</span>
                    @endif
                    @if($category)
                        <span class="badge float-right mr-2"
                              style="background-color: {{ $category->hex ?? '#cecece' }};color:#fff;">{{ $category->name}}</span>
                    @endif
                </h5>
                <h3 class="float-left float-md-none">Vraag #{{ $question->id }}</h3>

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
                    @if(Auth::check() && Auth::user()->isAdmin())
                        <form action="{{ route('answer.delete') }}" method="POST">
                            @csrf
                            <input type="text" name="id" readonly hidden value="{{ $answer->id }}">
                            <button onclick="return confirm('Weet u zeker dat u dit antwoord wilt verwijderen?')"
                                    class="ml-3 btn btn-danger float-right">Antwoord verwijderen
                            </button>
                        </form>
                    @endif
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
    </div>
    @if(Auth::check())
        <div class="modal fade" id="close-modal" tabindex="-1" role="dialog" aria-labelledby="close-modal"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{ route('question.close', ['id' => $question->id]) }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="answered"> Hoe wilt u deze vraag markeren?</label>
                                <select name="answered" id="answered" class="form-control">
                                    <option value="1">Beantwoord</option>
                                    <option value="0">Gesloten</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-info">Opslaan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
@endsection
