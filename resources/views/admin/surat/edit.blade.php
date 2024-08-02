<body>
    <div class="container">
      <h1>Edit Surat</h1>
      <form action="{{ route('surat.update', $surat) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="nomor_surat" class="form-label">Nomor Surat</label>
          <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="{{ $surat->nomor_surat }}">
          @error('nomor_surat')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

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
          <input type="text" class="form-control" id="judul" name="judul" value="{{ $surat->judul }}">
          @error('judul')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
            <label for="tujuan" class="form-label">Tujuan Surat</label>
            <input type="text" class="form-control" id="tujuan" name="tujuan" value="{{ $surat->judul }}">
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
          <p>Current file: {{ $surat->file_surat }}</p>
        </div>
        <a href="{{ route('surat.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </body>
