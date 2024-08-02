<div class="container mt-5">
    <div class="mb-3">
      <a href="{{ route('sertifikat.create') }}" class="btn btn-primary">Unggah Sertifikat</a>
      <a href="{{ route('sertifikat.index_pelatihan') }}" class="btn btn-primary">Jenis Pelatihan</a>
    </div>
    <div class="mb-3">
      <div class="input-group">
        <input type="text" class="form-control" id="searchInput" placeholder="Cari Kategori">
        <button class="btn btn-secondary" onclick="searchTable()">Cari</button>
      </div>
    </div>
    <table class="table table-bordered" id="suratTable">
      <thead>
        <tr>
          <th>Nomor Sertifikat</th>
          <th>Periode Pelatihan</th>
          <th>Lokasi</th>
          <th>Jenis Pelatihan</th>
          <th>Nomor Urut Sertifikat</th>
          <th>nama lengkap</th>
          <th>Waktu Unggah</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($sertifikat as $sertifikats)
        <tr>
          <td>{{ $sertifikats->nomor_sertifikat }}</td>
          <td>{{ $sertifikats->periode }}</td>
          <td>{{ $sertifikats->id_pelatihan }}</td>
          <td>{{ $sertifikats->lokasi }}</td>
          <td>{{ $sertifikats->nomor_urut }}</td>
          <td>{{$sertifikats->nama}}</td>
          <td>{{$sertifikats->created_at}}</td>
          <td>
            <a href="{{ route('sertifikat.show', $sertifikats) }}" class="btn btn-info">Lihat</a>
            <a href="{{ asset('storage/sertifikat/' . $sertifikats->file_sertifikat) }}" class="btn btn-warning"
              target="_blank">Unduh Sertifikat</a>
            <form action="{{ route('sertifikat.destroy', $sertifikats) }}" method="POST" style="display: inline-block;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger"
                onclick="return confirm('Apakah Anda yakin ingin menghapus file ini?')">Hapus</button>
            </form>

          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
