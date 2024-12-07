@extends('layout')

@section('content')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- Kullanıcı Yönetim Alanı -->

<div class="container d-flex justify-content-center align-items-center">
    <div class="table-responsive w-100">
        <h1 class="text-center mb-4 text-danger">Kullanıcı Paneli</h1>
        <table class="table table-bordered table-hover table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Ad</th>
                    <th>Email</th>
                    <th>Yetki</th>
                    <th>Eylemler</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <form method="POST" action="{{ route('panel.update', $user->id) }}">
                            @csrf
                            @method('PUT')
                            <td>{{ $user->id }}</td>
                            <td>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}" 
                                    {{ Auth::user()->of ?
                                        (Auth::user()->id !== $user->id && $user->of == 1 ? 'disabled' : '') 
                                        :
                                        (Auth::user()->id !== $user->id ? 'disabled' : '')}}>
                            </td>
                            <td>
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}" 
                                    {{ Auth::user()->of ?
                                        (Auth::user()->id !== $user->id ? 'disabled' : '') 
                                        :
                                        (Auth::user()->id !== $user->id ? 'disabled' : '')}}>
                            </td>
                            <td>{{ $user->of == 1 ? 'Admin' : 'Üye' }}</td>
                            <td>
                                @if (Auth::user()->of)
                                    @if($user->id != Auth::user()->id && $user->of != 0)
                                        <!-- null -->
                                    @else
                                        <button type="submit" class="btn btn-success">Güncelle</button>
                                    @endif
                                @else
                                    @if($user->id != Auth::user()->id)
                                        <!-- null -->
                                    @else
                                        <button type="submit" class="btn btn-success">Güncelle</button>
                                    @endif
                                @endif
                        </form>

                        <!-- Silme ve Admin Yapma İşlemleri -->
                        @if($user->id != Auth::user()->id && $user->of != 0)
                            <!-- Başka bir kullanıcı ve adminse -->
                            <span>Yetkiniz Yok</span>
                        @elseif (Auth::user()->of == 1)
                            <!-- Adminse -->
                            @if ($user->id != Auth::user()->id && $user->of != 1)
                                <!-- Başka biriyse ve üyeyse -->
                                <form method="POST" action="{{ route('panel.destroy', $user->id) }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" title="Kullanıcıyı sil">
                                        <i class="fa-solid fa-times"></i> Sil
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('panel.promote', $user->id) }}" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-primary" title="Kullanıcıyı admin yap">
                                        <i class="fa-solid fa-user-shield"></i> Admin Yap
                                    </button>
                                </form>
                            @else
                                <!-- Bizsek -->
                                <button class="btn btn-secondary" disabled>
                                    <i class="fa-solid fa-times"></i> Sil
                                </button>
                                <button class="btn btn-secondary" disabled>
                                    <i class="fa-solid fa-user-shield"></i> Admin Yap
                                </button>
                            @endif
                        @elseif($user->id != Auth::user()->id)
                            <span>Yetkiniz yok</span>
                        @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Kategoriler Yönetim Alanı -->
<hr class="mt-5">

<div class="container mt-5">
    <h1 class="text-center mb-4 text-danger">Kategori Paneli</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Kategori Adı</th>
                    <th>Eylemler</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <form method="POST" action="{{ route('categories.update', $category->id) }}">
                            @csrf
                            @method('PUT')
                            <td>{{ $category->id }}</td>
                            <td>
                                <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                            </td>
                            <td>
                                @if (Auth::user()->of != 0)
                                    <button type="submit" class="btn btn-success">Güncelle</button>
                                @endif
                        </form>
                        <form method="POST" action="{{ route('categories.destroy', $category->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')

                            @if (Auth::user()->of != 0)
                                <button type="submit" class="btn btn-danger">Sil</button>
                            @else
                                <span>Yetkiniz Yok</span>
                            @endif
                        </form>
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Kategori Ekleme -->
    <h3 class="text-center mb-4 text-danger">Yeni Kategori Paneli</h3>
    <form method="POST" action="{{ route('categories.store') }}" class="mt-4">
        @csrf
        <div class="input-group">
            @if (Auth::user()->of != 0)
                <input type="text" name="name" class="form-control" placeholder='Yeni Kategori Adı' required>
                <button type="submit" class="btn btn-primary">Ekle</button>
            @else
                <input type="text" name="name" class="form-control" placeholder='Yetkiniz Yok' disabled>
                <button type="submit" class="btn btn-primary" disabled>Ekle</button>                       
            @endif
        </div>
    </form>
</div>

<!-- Haberler Yönetim Alanı -->
<hr class="mt-5">

<div class="container mt-5 w-100">
    <h1 class="text-center mb-4 text-danger">Haber Yönetimi</h1>
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h1 class="h3 mb-0 text-center">Düzenleme Alanı</h1>
        </div>
        <div class="card-body">                         
            <form method="GET" action="{{ route('panel.search') }}" class="mb-4 w-50">
                <div class="form-group">
                    <label for="news_id">Haber ID</label>
                    <input 
                        type="number" 
                        name="news_id" 
                        id="news_id" 
                        class="form-control" 
                        placeholder="Haber ID girin" 
                        required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Haber Getir</button>
            </form>
            <h4>{{$news->id}} idli haber</h4>                                
            @if ($news)
                <form method="POST" action="{{ route('panel.news.update', $news->id) }}">
                    @csrf

                    <div class="form-group">
                        <label for="title">Başlık</label>
                        <input 
                            type="text" 
                            name="title" 
                            id="title" 
                            class="form-control" 
                            value="{{ $news->title }}" 
                            required>
                    </div>

                    <div class="form-group">
                        <label for="description">Açıklama</label>
                        <textarea 
                            name="description" 
                            id="description" 
                            class="form-control" 
                            rows="3"
                            required>{{ $news->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="category_id">Kategori</label>
                        <select name="category_id" id="category_id" class="form-control" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" 
                                    {{ $news->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">Görsel URL</label>
                        <input 
                            type="url" 
                            name="image" 
                            id="image" 
                            class="form-control" 
                            value="{{ old('image', $news->image ?? '') }}" 
                            placeholder="Görsel URL'sini girin">
                        
                        @if (!empty($news->image))
                            <div class="mt-2">
                                <img src="{{ $news->image }}" alt="Haber Görseli" class="img-thumbnail" width="150">
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="content">İçerik</label>
                        <textarea 
                            name="content" 
                            id="content" 
                            class="form-control" 
                            rows="5"
                            required>{{ $news->content }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="is_active">Aktif</label>
                        <select name="is_active" id="is_active" class="form-control" required>
                            <option value="1" {{ $news->is_active ? 'selected' : '' }}>Evet</option>
                            <option value="0" {{ !$news->is_active ? 'selected' : '' }}>Hayır</option>
                        </select>
                    </div>

                    @if (Auth::user()->of != 0)
                        <button type="submit" class="btn btn-success btn-block mt-3">Güncelle</button>
                    @else
                        <button type="submit" class="btn btn-secondary btn-block mt-3" disabled>Güncelleme Yetkiniz Yok</button>
                    @endif
                </form>
                
                @if (Auth::user()->of != 0)
                    <form method="POST" action="{{ route('panel.news.destroy', $news->id) }}" class="mt-3">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-block">Sil</button>
                    </form>
                @else
                    <form method="POST" action="{{ route('panel.news.destroy', $news->id) }}" class="mt-3">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-secondary btn-block" disabled>Silme Yetkiniz Yok</button>
                    </form>
                @endif
            @endif
        </div>
    </div>
</div>


@endsection
