<div class="container mt-5">
    <h1>Arsip Surat</h1>
    <div class="mb-3">
      <a href="{{ route('surat.create') }}" class="btn btn-primary">Unggah Surat</a>
      {{-- <a href="{{ route('about') }}" class="btn btn-primary">About</a> --}}
      <a href="{{ route('surat.index_kategori') }}" class="btn btn-primary">Kategori</a>
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
          <th>Nomor Surat</th>
          <th>Kategori</th>
          <th>Judul</th>
          <th>tujuan</th>
          <th>Waktu Pengarsipan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($surats as $surat)
        <tr>
          <td>{{ $surat->nomor_surat }}</td>
          <td>{{ $surat->kategori->name }}</td>
          <td>{{ $surat->judul }}</td>
          <td>{{ $surat->tujuan }}</td>
          <td>{{$surat->created_at}}</td>
          <td>
            <a href="{{ route('surat.show', $surat) }}" class="btn btn-info">Lihat</a>
            <a href="{{ asset('storage/surat/' . $surat->file_surat) }}" class="btn btn-warning"
              target="_blank">Unduh PDF</a>
            <form action="{{ route('surat.destroy', $surat) }}" method="POST" style="display: inline-block;">
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
