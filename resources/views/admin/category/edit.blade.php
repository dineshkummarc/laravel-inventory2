@extends('layouts.main')
@section('title', 'Ubah Kategori')
@section('content')
    <h1>Ubah Kategori</h1>
    @foreach (['success' => 'success', 'errors' => 'danger'] as $msg => $type)
        @if (session($msg))
            <div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                <strong>{{ session($msg) }}</strong>
            </div>
        @endif
    @endforeach
    @include('admin.category._form')
@endsection
