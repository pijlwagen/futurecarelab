@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="">
            <div class="form-group row">
                <div class="col-md-9">
                    <select name="categorie" class="form-control">
                        @foreach(\App\Models\Category::all() as $cat)
                            @if($cat->name === Request::query('categorie'))
                                <option value="{{ $cat->name }}" selected>{{ $cat->name }}</option>
                            @else
                                <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary w-100">Filteren</button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-md-8 mb-3">
                <div class="card">
                    <div class="card-header">
                        <strong>Open vragen</strong>
                    </div>
                    <div class="card-body">
                        @foreach($questions as $question)
                            <a href="{{ route('question.view', ['id' => $question->id]) }}">Vraag
                                #{{ $question->id }}</a><br>
                            <small
                                class="text-muted font-italic">{{ \Illuminate\Support\Str::limit($question->content, 30) }}</small>
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
                            @php($category = $item->getCategory())
                            <a href="{{ route('question.view', ['id' => $item->id]) }}">Vraag #{{ $item->id }} @if($tag)
                                    <span
                                        class="badge float-right"
                                        style="background-color: {{ $tag->hex }};color:#fff;">{{ $tag->name}}</span>
                                @endif
                                @if($category)
                                    <span
                                        class="badge float-right mr-2"
                                        style="background-color: {{ $category->hex ?? '#cecece' }};color:#fff;">{{ $category->name}}</span>
                                @endif
                            </a>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
