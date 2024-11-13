@extends('layout')

@section('main')
    @if(isset($selectedMessage))
        <div class="container w-50 mx-auto mt-5">
            <h3>Mesaj Görüntüleme</h3>
            <form action="{{ route('messages.update', $selectedMessage->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">İsim</label>
                    <input type="text" name="name" class="form-control" value="{{ $selectedMessage->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control" value="{{ $selectedMessage->email }}" required>
                </div>
                <div class="mb-3">
                    <label for="education" class="form-label">Eğitim</label>
                    <input type="text" name="education" class="form-control" value="{{ $selectedMessage->education }}" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Mesaj</label>
                    <textarea name="message" class="form-control" rows="4" required>{{ $selectedMessage->message }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Güncelle</button>
                <a href="/messages" class="btn btn-secondary">Geri</a>
            </form>
        </div>
    @else
        <table class="table table-striped mx-auto">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">İsim</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Oluşturulma Tarihi</th>
                    <th scope="col">Eğitim</th>
                    <th scope="col">İşlem</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                    <tr>
                        <td class="text-danger fw-bold">{{ $message->id }}</td>
                        <td class="text-danger">{{ $message->name }}</td>
                        <td class="text-danger">{{ $message->email }}</td>
                        <td class="text-danger">{{ $message->created_at }}</td>
                        <td class="text-success">{{ $message->education }}</td>
                        <td>
                            <a class="btn btn-primary" onclick="window.location.href='{{ route('messages.read', $message->id) }}'">Oku & Düzenle</a>
                            <a class="btn btn-danger" href="/messages/{{$message->id}}/delete">Sil</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="">{{$messages->links()}}</div>
    @endif
@endsection
