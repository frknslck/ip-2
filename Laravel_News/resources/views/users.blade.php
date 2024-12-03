@extends('layout')

@section('content')

<div class="container d-flex justify-content-center align-items-center">
    <div class="table-responsive w-50">
        <h1 class="text-center mb-4 text-black">Tüm Kullanıcılar</h1>
        <table class="table table-bordered table-hover table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Ad</th>
                    <th>Email</th>
                    <th>Yetki</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->of ? 'Admin' : 'Üye' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
