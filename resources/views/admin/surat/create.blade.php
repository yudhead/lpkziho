
<head>
    <title>Unggah Surat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
<body>
    <div class="container">
      <h1>Unggah Surat</h1>
      <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="nomor_surat" class="form-label">Nomor Surat</label>
          <input type="text" class="form-control" id="nomor_surat" name="nomor_surat">
          @error('nomor_surat')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <!-- surat/create.blade.php -->

        <div class="form-group">
          <label for="id_kategori" class="form-label">Kategori</label>
          <select id="id_kategori" name="id_kategori" class="form-control">
              @foreach ($kategori as $id => $nama_kategori)
                  <option value="{{ $id }}">{{ $nama_kategori }}</option>
              @endforeach
          </select>
      </div>


        <div class="mb-3">
          <label for="judul" class="form-label">Judul</label>
          <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}">
          @error('judul')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
            <label for="tujuan" class="form-label">Tujuan Surat</label>
            <input type="text" class="form-control" id="tujuan" name="tujuan" value="{{ old('tujuan') }}">
            @error('tujuan')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

        <div class="mb-3">
          <label for="file_surat" class="form-label">File Surat (PDF)</label>
          <input type="file" class="form-control" id="file_surat" name="file_surat">
          @error('file_surat')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <a href="{{ route('surat.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </body>
