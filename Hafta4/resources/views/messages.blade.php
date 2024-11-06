@extends('layout')

@section('main')
    @if(isset($selectedMessage))
        <div class="container w-50 mx-auto mt-5">
            <h3>Mesaj Detayları</h3>
            <table class="table table-bordered">
                <tr><th>ID</th><td>{{ $selectedMessage->id }}</td></tr>
                <tr><th>İsim</th><td>{{ $selectedMessage->name }}</td></tr>
                <tr><th>E-mail</th><td>{{ $selectedMessage->email }}</td></tr>
                <tr><th>Oluşturulma Tarihi</th><td>{{ $selectedMessage->created_at }}</td></tr>
                <tr><th>Mesaj</th><td>{{ $selectedMessage->message }}</td></tr>
                <tr><th>Eğitim</th><td>{{ $selectedMessage->education }}</td></tr>
            </table>
            <a href="/messages" class="btn btn-primary">Geri</a>
        </div>
    @else
        <table class="table table-striped w-75 mx-auto">
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
                        <a class="btn btn-primary" onclick="window.location.href='{{ route('messages.read', $message->id) }}'">Oku</a>

                        <a class="btn btn-danger" href="/messages/{{$message -> id}}/delete">Sil</a>
                        <a class="btn btn-danger" href="/messages/{{$message -> id}}/delete">Sil</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
