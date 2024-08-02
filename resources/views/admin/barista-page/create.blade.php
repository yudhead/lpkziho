<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Page</title>
  <!-- Tambahkan Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-5">
    <h1>Create Page</h1>
    <form action="{{ route('admin.barista-page.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" required>
      </div>
      <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" id="content" name="content" rows="4"></textarea>
      </div>
      <div class="form-group">
        <label for="foto">Foto</label>
        <input type="file" id="foto" name="foto" class="small-input @error('foto') is-invalid @enderror" accept="image/*" >
        @error('foto')
          <span class="text-danger full-width">{{ $message }}</span>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Create</button>
      <a href="{{ route('barista-page.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>

  <!-- Tambahkan Bootstrap JS dan dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
