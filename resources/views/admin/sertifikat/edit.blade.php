<body>
  <div class="container">
    <h1>Edit Sertifikat</h1>
    <form action="{{ route('sertifikat.update', $sertifikat) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="nomor_sertifikat" class="form-label">Nomor sertifikat</label>
        <input type="text" class="form-control" id="nomor_sertifikat" name="nomor_sertifikat"
          value="{{ $sertifikat->nomor_sertifikat }}">
        @error('nomor_sertifikat')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="periode" class="form-label">Periode</label>
        <input type="text" class="form-control" id="periode" name="periode" value="{{ $sertifikat->periode }}">
        @error('periode')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="lokasi" class="form-label">Lokasi</label>
        <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ $sertifikat->lokasi }}">
        @error('lokasi')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="id_pelatihan" class="form-label">Pelatihan</label>
        <select id="id_pelatihan" name="id_pelatihan" class="form-control">
          @foreach ($pelatihan as $id => $id_pelatihan)
            <option value="{{ $id }}">{{ $id_pelatihan }}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="nomor_urut" class="form-label">Nomor Urut</label>
        <input type="text" class="form-control" id="nomor_urut" name="nomor_urut" value="{{ $sertifikat->nomor_urut }}">
        @error('nomor_urut')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{ $sertifikat->nama}}">
        @error('nama')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="file_sertifikat" class="form-label">File sertifikat (PDF)</label>
        <input type="file" class="form-control" id="file_sertifikat" name="file_sertifikat">
        @error('file_sertifikat')
          <div class="text-danger">{{ $message }}</div>
        @enderror
        <p>Current file: {{ $sertifikat->file_sertifikat }}</p>
      </div>

      <a href="{{ route('sertifikat.index') }}" class="btn btn-secondary">Kembali</a>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</body>
