@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2>Subscribe for Update!</h2>

            @if ($pesan = session('pesan'))
                <div class="alert alert-success">{{ $pesan }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <form action="" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>

                <button type="submit" class="btn btn-primary">Subscribe</button>
            </form>
        </div>
    </div>
</div>
@endsection
