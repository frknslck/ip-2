@extends('layout')

@section('main')

<div class="container w-50 mt-2 mb-5 mx-auto">
    <h5 class="fw-bold">İş Başvuru Formu</h5>
    <form action="" method="POST">
        @if ($errors->all())
            <div class="alert alert-danger">
                <strong>Hatalı Veri Girişi:</strong>
                <ul class="list-group">
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item">{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Adınız:</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Mailiniz:</label>
            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Telefon Numaranız:</label>
            <input type="tel" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" id="phone" name="phone" value="{{ old('phone') }}" required>
        </div>

        <div class="mb-3">
            <label for="dob" class="form-label">Doğum Tarihiniz:</label>
            <input type="date" class="form-control {{ $errors->has('dob') ? 'is-invalid' : '' }}" id="dob" name="dob" value="{{ old('dob') }}" required>
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Cinsiyet:</label><br>
            <input type="radio" id="male" name="gender" value="Erkek" {{ old('gender') == 'Erkek' ? 'checked' : '' }}> Erkek<br>
            <input type="radio" id="female" name="gender" value="Kadın" {{ old('gender') == 'Kadın' ? 'checked' : '' }}> Kadın<br>
            <input type="radio" id="other" name="gender" value="Atak Heli" {{ old('gender') == 'Diğer' ? 'checked' : '' }}> Diğer<br>
        </div>

        <div class="mb-3">
            <label for="education" class="form-label">Eğitim Durumunuz:</label>
            <select id="education" name="education" class="form-select {{ $errors->has('education') ? 'is-invalid' : '' }}" required>
                <option value="">Seçiniz</option>
                <option {{ old('education') == 'Lise' ? 'selected' : '' }}>Lise</option>
                <option {{ old('education') == 'Üniversite' ? 'selected' : '' }}>Üniversite</option>
                <option {{ old('education') == 'Yüksek Lisans' ? 'selected' : '' }}>Yüksek Lisans</option>
                <option {{ old('education') == 'Doktora' ? 'selected' : '' }}>Doktora</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="skills" class="form-label">Becerileriniz (birden fazla seçebilirsiniz):</label>
            <select id="skills" name="skills[]" class="form-select {{ $errors->has('skills') ? 'is-invalid' : '' }}" multiple required>
                <option value="PHP" {{ (is_array(old('skills')) && in_array('PHP', old('skills'))) ? 'selected' : '' }}>PHP</option>
                <option value="JavaScript" {{ (is_array(old('skills')) && in_array('JavaScript', old('skills'))) ? 'selected' : '' }}>JavaScript</option>
                <option value="CSS" {{ (is_array(old('skills')) && in_array('CSS', old('skills'))) ? 'selected' : '' }}>CSS</option>
                <option value="Laravel" {{ (is_array(old('skills')) && in_array('Laravel', old('skills'))) ? 'selected' : '' }}>Laravel</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="skin_color" class="form-label">Ten Renginizi Seçin:</label>
            <input type="color" class="form-control mx-auto form-control-color {{ $errors->has('skin_color') ? 'is-invalid' : '' }}" id="skin_color" name="skin_color" value="{{ old('skin_color') }}">
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Başvuru Mesajınız:</label>
            <textarea id="message" name="message" rows="5" class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" required>{{ old('message') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Başvuruyu Gönder</button>
    </form>
</div>

@endsection
