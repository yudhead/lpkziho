
<head>
    <title>Unggah Sertifikat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
<body>
    <div class="container">
      <h1>Unggah Sertifikat</h1>
      <form action="{{ route('sertifikat.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="nomor_sertifikat" class="form-label">Nomor Sertifikat</label>
          <input type="text" class="form-control" id="nomor_sertifikat" name="nomor_sertifikat">
          @error('nomor_sertifikat')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="periode" class="form-label">Periode</label>
            <input type="text" class="form-control" id="periode" name="periode" value="{{ old('periode') }}">
            @error('periode')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
        <div class="mb-3">
          <label for="lokasi" class="form-label">Lokasi</label>
          <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ old('lokasi') }}">
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
            <input type="text" class="form-control" id="nomor_urut" name="nomor_urut" value="{{ old('nomor_urut') }}">
            @error('nomor_urut')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
            @error('nama')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

        <div class="mb-3">
          <label for="file_sertifikat" class="form-label">File Sertifikat (PDF)</label>
          <input type="file" class="form-control" id="file_sertifikat" name="file_sertifikat">
          @error('file_sertifikat')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <a href="{{ route('sertifikat.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </body>
