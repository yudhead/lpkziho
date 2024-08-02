<div class="container">
    <h2>Edit Pelatihan</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('pelatihan.update', $pelatihan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name_pelatihan" class="form-label">Nama Pelatihan</label>
            <input type="text" class="form-control" id="name_pelatihan" name="name_pelatihan" value="{{ $pelatihan->name_pelatihan }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('sertifikat.index_pelatihan') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
