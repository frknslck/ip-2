@extends('layout')

@section('main')

<h5>İletişim Formu</h5>
<form action="" method="POST">
    @if ($errors->all())
        <div class="error-message">
            <strong>Hatalı Veri Girişi:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <br>
    @csrf
    <div class="form-group">
        <label for="name">Adınız:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
    </div>
    
    <div class="form-group">
        <label for="email">Mailiniz:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
    </div>

    <div class="form-group">
        <label for="subject">Konu:</label>
        <select id="subject" name="subject" required>
            <option value="">Seç</option>
            @foreach ($konular as $konu)
                <option {{ $konu == old('subject') ? 'selected' : '' }}>{{$konu}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="message">Mesajınız:</label>
        <textarea id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
    </div>

    <button type="submit">Yolla</button>
</form>

@endsection
