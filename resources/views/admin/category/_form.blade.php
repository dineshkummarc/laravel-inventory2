<form action="{{ isset($category) ? route('category.update', $category->id) : route('category.store') }}" method="post">
    @csrf
    @if (isset($category))
        @method('PUT')
    @endif
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name"
            value="{{ old('name', $category->name ?? '') }}" placeholder="Masukan Nama Kategori" required />
    </div>

    <button type="submit" class="btn btn-sm btn-{{ isset($category) ? 'warning' : 'primary' }} text-light">{{  isset($category) ? 'Ubah' : 'Tambah' }}</button>
    <a href="{{ route('category.index') }}" class="btn btn-sm btn-info text-light">Kembali</a>
</form>
