@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mb-3">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Naam</label>
                                <input type="text" value="{{ old('name', $user->name) }}" class="form-control @error('name') is-invalid @enderror" id="name"
                                       name="name">
                                @error('name')
                                <span class="invalid-feedback"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <input type="text" value="{{ old('email', $user->email) }}" class="form-control @error('email') is-invalid @enderror"
                                       id="email" name="email">
                                @error('email')
                                <span class="invalid-feedback"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">Adres</label>
                                <input type="text" value="{{ old('address', $user->address) }}" class="form-control"
                                       id="address" name="address">
                            </div>
                            <div class="form-group">
                                <label for="photo">Foto</label>
                                <input type="file" class="form-control" id="photo" name="photo" value="{{ $user->photo }}">
                            </div>
                            @if($user->photo)
                                <div class="form-group">
                                    <img src="/img/{{ $user->photo }}" alt="{{ $user->photo }}" class="img-fluid" style="max-width: 200px;max-height: 200px;">
                                </div>
                            @endif
                            <button class="btn btn-primary">Opslaan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Overige Informatie</h3>
                    </div>
                    <div class="card-body">
                        Geverifieerd: {{ $user->isVerified() ? 'Ja' : 'Nee' }}<br>
                        Geregistreerd sinds: {{ $user->created_at }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
