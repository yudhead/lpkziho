<div class="container overflow-auto">
    <h1>Daftar Pendaftaran</h1>

    {{-- Search form --}}
    <form action="{{ route('pendaftaran.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Cari pendaftaran..." value="{{ request()->input('query') }}">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hari</th>
                <th>Nama</th>
                <th>No HP</th>
                <th>NIK</th>
                <th>Alamat</th>
                <th>Pelatihan</th>
                <th>Jenis Kelamin</th>
                <th>Sekolah</th>
                <th>Agama</th>
                <th>Kota Lahir</th>
                <th>Pekerjaan</th>
                <th>Bekerja Detail</th>
                <th>Freelance Detail</th>
                <th>Tanggal Lahir</th>
                <th>Nama Ibu</th>
                <th>Email</th>
                <th>Foto KTP</th>
                <th>Tanggal Terbit</th>
                <th>Tanggal Berakhir</th>
                <th>Pas Foto</th>
                <th>Foto Ijazah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendaftarans as $pendaftaran)
                <tr>
                    <td>{{ $pendaftaran->id }}</td>
                    <td>{{ $pendaftaran->harie }}</td>
                    <td>{{ $pendaftaran->name }}</td>
                    <td>{{ $pendaftaran->nohp }}</td>
                    <td>{{ $pendaftaran->nik }}</td>
                    <td>{{ $pendaftaran->alamat }}</td>
                    <td>{{ $pendaftaran->programStudy->nama_program_studi ?? 'Tidak ada data' }}</td>
                    <td>{{ $pendaftaran->jenis_kelamin }}</td>
                    <td>{{ $pendaftaran->sekolah }}</td>
                    <td>{{ $pendaftaran->agama }}</td>
                    <td>{{ $pendaftaran->kota_lahir }}</td>
                    <td>{{ $pendaftaran->pekerjaan }}</td>
                    <td>{{ $pendaftaran->bekerja_detail }}</td>
                    <td>{{ $pendaftaran->freelance_detail }}</td>
                    <td>{{ $pendaftaran->tgl_lahir }}</td>
                    <td>{{ $pendaftaran->nama_ibu }}</td>
                    <td>{{ $pendaftaran->email }}</td>
                    <td>
                        @if ($pendaftaran->foto_ktp)
                            <img src="{{ asset('storage/' . $pendaftaran->foto_ktp) }}" alt="Foto KTP" width="50">
                        @endif
                    </td>
                    <td>{{ $pendaftaran->tanggal_terbit }}</td>
                    <td>{{ $pendaftaran->tanggal_berakhir }}</td>
                    <td>
                        @if ($pendaftaran->pas_foto)
                            <img src="{{ asset('storage/' . $pendaftaran->pas_foto) }}" alt="Pas Foto" width="50">
                        @endif
                    </td>
                    <td>
                        @if ($pendaftaran->foto_ijazah)
                            <img src="{{ asset('storage/' . $pendaftaran->foto_ijazah) }}" alt="Foto Ijazah" width="50">
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>