@extends('layouts.main')

@section('title', 'Kategori')
@section('content')
    <h1>Data Kategori</h1>
    <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary mb-3">Tambah</a>

    @foreach (['success' => 'success', 'errors' => 'danger'] as $msg => $type)
        @if (session($msg))
            <div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                <strong>{{ session($msg) }}</strong>
            </div>
        @endif
    @endforeach

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($category as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td class="d-flex">
                        <a href="{{ route('category.edit', $item->id) }}"
                            class="btn btn-sm btn-warning text-light me-1">Edit</a>
                        <form action="{{ route('category.destroy', $item->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <th class="text-center text-danger" colspan="10">Tidak ada data.</th>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
