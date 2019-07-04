@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="mt-5"><del>Kalkulator</del>Translator 📖</h2>

            @if ($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <form action="" method="POST">
                @csrf

                <div class="form-group">
                    <label for="text">Teks yang mau di-translate</label>
                    <textarea name="text" class="form-control" id="text" rows="5" required>{{ isset($originalText) ? $originalText : old('text') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="to">Ke bahasa apa?</label>
                    <select name="to" id="to" class="form-control">
                        <option value="en" selected>English</option>
                        <option value="ar">Arab</option>
                        <option value="hu">Hungarian</option>
                        <option value="de">German</option>
                        <option value="th">Thailand</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Translate!</button>
            </form>

            <h3 class="mt-5">Hasil</h3>
            <hr>
            {{-- @if (isset($result))
                {{ $result }}
            @endif --}}

            @isset ($result)
                {{ $result[0]->translations[0]->text }}
            @endisset

            {{-- {{ isset($result) ? $result : '' }} --}}
        </div>
    </div>
</div>
@endsection
