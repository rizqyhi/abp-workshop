@extends('layout')

@section('content')
<table class="table table-striped">
    <thead>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Angkatan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mahasiswa as $m)
        <tr>
            <td>
                <a href="{{ route('students.detail', $m['nim']) }}">{{ $m['nim'] }}</a>
            </td>
            <td>{{ $m['nama'] }}</td>
            <td>{{ $m['angkatan'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
