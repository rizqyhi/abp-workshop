@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Avatar</th>
                        <th>Email</th>
                        <th>Nama</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users->data as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td><img src="{{ $user->avatar }}" width="64"></td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
