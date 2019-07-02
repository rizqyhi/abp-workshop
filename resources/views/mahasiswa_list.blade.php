@extends('layout')

@section('content')
@if (session('pesan'))
    <div class="alert alert-success">{{ session('pesan') }}</div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Angkatan</th>
            <th>Alamat</th>
            <th>Buku</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mahasiswa as $m)
        <tr>
            <td>
                <a href="{{ route('students.detail', $m->nim) }}">{{ $m->nim }}</a>
            </td>
            <td>{{ $m->nama }}</td>
            <td>{{ $m->angkatan }}</td>
            <td>{{ $m->address }}</td>
            <td>
                <ul>
                    {{-- @foreach ($m->books()->where('author', 'Tan Malaka')->get() as $book) --}}
                    @foreach ($m->books as $book)
                        <li>{{ $book->title }}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
