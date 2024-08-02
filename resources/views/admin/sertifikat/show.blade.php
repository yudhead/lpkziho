<!DOCTYPE html>
<html>

<head>
  <title>Detail Sertifikat</title>
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
      <div class="mb-3">
        <label for="nomor_surat" class="form-label detail-label">Nomor Sertifikat</label>
        <p class="form-control-plaintext">{{ $sertifikat->nomor_sertifikat }}</p>
      </div>
      <div class="mb-3">
        <label for="periode" class="form-label detail-label">Periode Pelatihan</label>
        <p class="form-control-plaintext">{{ $sertifikat->periode }}</p>
      </div>
      <div class="mb-3">
        <label for="id_pelatihan" class="form-label detail-label">Jenis Pelatihan</label>
        <p class="form-control-plaintext">{{ $sertifikat->pelatihan->name_pelatihan}}</p>
      </div>
      <div class="mb-3">
        <label for="lokasi" class="form-label detail-label">Lokasi</label>
        <p class="form-control-plaintext">{{ $sertifikat->lokasi }}</p>
      </div>
      <div class="mb-3">
        <label for="nomor_urut" class="form-label detail-label">Nomor Urut</label>
        <p class="form-control-plaintext">{{ $sertifikat->nomor_urut }}</p>
      </div>
      <div class="mb-3">
        <label for="nama" class="form-label detail-label"> Nama</label>
        <p class="form-control-plaintext">{{ $sertifikat->nama }}</p>
      </div>
      <div class="mb-3">
        <label for="file_sertifikat" class="form-label detail-label">File sertifikat</label>
        <a href="{{ asset('storage/sertifikat/' . $sertifikat->file_sertifikat) }}" class="btn btn-outline-primary"
          target="_blank">Download sertifikat</a>
      </div>
      <a href="{{ route('sertifikat.edit', $sertifikat->id) }}" class="btn btn-secondary">Edit sertifikat</a>
      <a href="{{ route('sertifikat.index') }}" class="btn btn-primary">Kembali</a>
    </div>

    <div class="card shadow-sm mt-4">
      <h2 class="card-title">Preview File</h2>
      <iframe src="{{ asset('storage/sertifikat/' . $sertifikat->file_sertifikat) }}" frameborder="0" width="100%" height="800"
        style="min-height: 850px;"></iframe>
    </div>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
