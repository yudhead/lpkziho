<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bakery Page</title>
    <!-- Tambahkan Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="container mt-5">
    <h1>Edit Bakery Page</h1>
    <form id="editForm" action="{{ route('admin.bakery-page.update', $bakery_pages->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $bakery_pages->title }}" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="4" required>{{ $bakery_pages->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" id="foto" name="foto"
                class="small-input @error('foto') is-invalid @enderror" accept="image/*">
                @if ($bakery_pages->foto)
                <p>Current Photo: <img src="{{ asset('storage/' . $bakery_pages->foto) }}" alt="Current Photo" width="100"></p>
            @endif
            @error('foto')
                <span class="text-danger full-width">{{ $message }}</span>
            @enderror
        </div>
        <button type="button" class="btn btn-primary" onclick="confirmUpdate()">Update</button>
        <a href="{{ route('bakery-page.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<!-- Tambahkan Bootstrap JS dan dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmUpdate() {
        Swal.fire({
            title: 'Anda yakin??',
            text: "Anda yakin ingin mengupdate ini?.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, update halaman ini!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('editForm').submit();
            }
        })
    }
</script>
</body>
</html>
