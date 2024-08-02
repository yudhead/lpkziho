  <div class="container">
    <div class="mb-3">
        <div class="input-group">
          <input type="text" class="form-control" id="searchInput" placeholder="Cari Kategori">
          <button class="btn btn-secondary" onclick="searchTable()">Cari</button>
        </div>
      </div>
      <table class="table table-bordered" id="suratTable">
      <thead>
        <tr>
          <th>ID Kategori</th>
          <th>Nama Kategori</th>
          <th>Keterangan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($kategori as $kategori)
        <tr>
          <td>{{ $kategori->id }}</td>
          <td>{{ $kategori->name }}</td>
          <td>{{ $kategori->title }}</td>
          <td>
            <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
            </form>

            <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-primary">Edit</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

     <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Tambah
        Kategori</button>
        <a href="{{ route('surat.index') }}" class="btn btn-primary">Kembali</a>

  </div>

  <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addCategoryModalLabel">Tambah Kategori Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('kategori.store') }}" method="POST">
        @csrf

        <div class="modal-body">
          <div class="mb-3">
            <label for="id" class="form-label">ID Kategori</label>
            <input type="number" class="form-control" id="id" name="id" value="{{ old('id', Illuminate\Support\Facades\DB::table('kategori')->max('id') + 1) }}" readonly>
          </div>

        <div class="modal-body">
          <div class="mb-3">
            <label for="name" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="title" class="form-label">Judul Kategori</label>
            <input type="text" class="form-control" id="title" name="title" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan Kategori</button>
        </div>
      </form>

    </div>
  </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function searchTable() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("searchInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("suratTable");
      tr = table.getElementsByTagName("tr");

      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1]; // Index 1 untuk kolom Kategori
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
  </script>
