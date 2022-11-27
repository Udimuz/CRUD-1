@extends('layout')

@section('title', 'User: '.$user->name)

@section('content')
    <a type="button" class="btn btn-secondary" href="{{ route('users.index') }}">Back to users</a>

    <div class="card my-3">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">ID {{ $user->id }}</li>
            <li class="list-group-item">Имя: {{ $user->name }}</li>
            <li class="list-group-item">Почта: {{ $user->email }}</li>
            <li class="list-group-item">Добавлен: {{ $user->created_at->format('d.m.Y H:i:s') }}</li>
            <li class="list-group-item">Изменение: {{ $user->updated_at->format('d.m.Y H:i:s') }}</li>
        </ul>
    </div>

    <form method="POST" action="{{ route('users.destroy', $user) }}">
        @csrf
        @method('DELETE')
        <a class="btn btn-warning" href="{{ route('users.edit', $user) }}">Edit</a>
        <button class="btn btn-danger" type="submit">Delete</button>
    </form>

@endsection