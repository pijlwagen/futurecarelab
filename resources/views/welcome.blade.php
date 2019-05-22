@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="" method="POST">
                    <h2 class="text-center">Stel uw vraag</h2>
                    <textarea name="question" id="question" cols="30" rows="10" class="form-control"></textarea>
                </form>
            </div>
        </div>
    </div>
@endsection
