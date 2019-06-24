@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-responsive-md table-striped">
            <tr>
                <th>ID</th>
                <th>E-Mail</th>
                <th>Geverifieerd</th>
                <th>Geblokkeerd</th>
                <th>Acties</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <th>{{ $user->id }}</th>
                    <td>{{ $user->email }}</td>
                    <td>{!! $user->verified ? '<i class="fas fa-check text-success"></i>' : '<i class="fas fa-times text-danger"></i>' !!}</td>
                    <td>{!! $user->isBlocked() ? '<i class="fas fa-check text-success"></i>' : '<i class="fas fa-times text-danger"></i>' !!}</td>
                    <td>
                        @if(!$user->verified)
                            <a href="{{ route('admin.user.verify', ['id' => $user->id]) }}" class="text-primary mr-2">Verifiëren</a>
                        @endif
                        @if($user->isBlocked())
                            <a href="{{ route('admin.user.block', ['id' => $user->id]) }}" class="text-warning mr-2">De-blokkeren</a>
                        @else
                            <a href="{{ route('admin.user.block', ['id' => $user->id]) }}" class="text-danger mr-2">Blokkeren</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $users->links() }}
    </div>
@endsection
