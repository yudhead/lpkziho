<!DOCTYPE html>
<html>

<head>
  <title>Detail Surat</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .container {
      margin-top: 50px;
    }

    .card {
      padding: 20px;
    }

    .btn-primary,
    .btn-secondary {
      margin-top: 20px;
    }

    .detail-label {
      font-weight: bold;
      margin-top: 10px;
    }

    iframe {
      width: 100%;
      height: 500px;
      border: 1px solid #ccc;
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="card shadow-sm">
      <h1 class="card-title">Detail Surat</h1>
      <div class="mb-3">
        <label for="nomor_surat" class="form-label detail-label">Nomor Surat</label>
        <p class="form-control-plaintext">{{ $surat->nomor_surat }}</p>
      </div>
      <div class="mb-3">
        <label for="kategori" class="form-label detail-label">Kategori</label>
        <p class="form-control-plaintext">{{ $surat->kategori->name }}</p>
      </div>
      <div class="mb-3">
        <label for="judul" class="form-label detail-label">Judul</label>
        <p class="form-control-plaintext">{{ $surat->judul }}</p>
      </div>
      <div class="mb-3">
        <label for="tujuan" class="form-label detail-label">Tujuan Surat</label>
        <p class="form-control-plaintext">{{ $surat->tujuan }}</p>
      </div>
      <div class="mb-3">
        <label for="file_surat" class="form-label detail-label">File Surat</label>
        <a href="{{ asset('storage/surat/' . $surat->file_surat) }}" class="btn btn-outline-primary"
          target="_blank">Download Surat</a>
      </div>
      <a href="{{ route('surat.edit', $surat->id) }}" class="btn btn-secondary">Edit Surat</a>
      <a href="{{ route('surat.index') }}" class="btn btn-primary">Kembali</a>
    </div>

    <div class="card shadow-sm mt-4">
      <h2 class="card-title">Preview File</h2>
      <iframe src="{{ asset('storage/surat/' . $surat->file_surat) }}" frameborder="0" width="100%" height="800"
        style="min-height: 850px;"></iframe>
    </div>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
