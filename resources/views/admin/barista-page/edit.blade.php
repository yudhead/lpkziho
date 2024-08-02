<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barista Page</title>
    <!-- Tambahkan Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Barista Page</h1>
        <form id="editForm" action="{{ route('admin.barista-page.update', $barista_pages->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $barista_pages->title }}" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" rows="4" required>{{ $barista_pages->content }}</textarea>
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" id="foto" name="foto"
                    class="small-input @error('foto') is-invalid @enderror" accept="image/*">
                    @if ($barista_pages->foto)
                    <p>Current Photo: <img src="{{ asset('storage/' . $barista_pages->foto) }}" alt="Current Photo" width="100"></p>
                @endif
                @error('foto')
                    <span class="text-danger full-width">{{ $message }}</span>
                @enderror
            </div>
            <button type="button" class="btn btn-primary" onclick="confirmUpdate()">Update</button>
            <a href="{{ route('barista-page.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script>
    function confirmUpdate() {
        if (confirm("Are you sure you want to update this page?")) {
            document.getElementById('editForm').submit();
        }
    }
    </script>


<!-- Tambahkan Bootstrap JS dan dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmUpdate() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to update this information.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('editForm').submit();
            }
        })
    }
</script>
</body>
</html>
