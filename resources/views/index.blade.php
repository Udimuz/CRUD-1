@extends('layout')

@section('title', 'Земляне')

@section('content')
    <a class="btn btn-primary" href="{{ route('users.create') }}">Create user</a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">ID</th>
            <th scope="col">Имя</th>
            <th scope="col">E-mail</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @php $count=0 @endphp
        @foreach($users as $user)
            <tr>
                <td>{{ ++$count }}</td>
                <td>{{ $user->id }}</td>
                <td><a href="{{ route('users.show', $user) }}">{{ $user->name }}</a></td>
                <td>{{ $user->email }}</td>
                <td>
                    <form method="POST" action="{{ route('users.destroy', $user) }}">
                        @csrf
                        @method('DELETE')
                    <a class="btn btn-warning" href="{{ route('users.edit', $user) }}">Edit</a>
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        <tr>
        </tbody>
    </table>
@endsection