@extends('layout')

@section('title', isset($user) ? 'Update: '.$user->name : 'Добавление пользователя')

@section('content')
    <a type="button" class="btn btn-secondary" href="{{ route('users.index') }}">Back to users</a>
    <form class="mt-4" action="{{ isset($user) ? route('users.update', $user) : route('users.store') }}" method="POST">
        @csrf
        @isset($user) @method('PUT') @endisset
        <div class="col">
            <input name="name"
                   value="{{ $user->name ?? null }}"
                   type="text" class="form-control" placeholder="Name" aria-label="name">
        </div>
        <div class="col mt-3">
            <input name="email"
                   value="{{ isset($user) ? $user->email : null }}"
                   type="text" class="form-control" placeholder="E-mail" aria-label="email">
        </div>
        <button type="submit" class="btn btn-success mt-3">{{ isset($user) ? 'Сохранить' : 'Создать' }}</button>
    </form>
@endsection