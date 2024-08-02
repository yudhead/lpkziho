<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Pages</title>
    <!-- Tambahkan Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tambahkan SortableJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <style>
        .page-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: move;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 5px;
            background: #f9f9f9;
        }
        .page-item:hover {
            background: #f0f0f0;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1>Manage Program Pelatihan Pages</h1>
    <a href="{{ route('admin.program-pelatihan-page.create') }}" class="btn btn-primary mb-3">Create New Page</a>
    <ul id="page-list" class="list-group">
        @foreach ($program_pelatihan_pages as $page)
            <li class="list-group-item page-item" data-id="{{ $page->id }}">
                <div class="page-content">
                    <strong>{{ $page->title }}</strong>
                    <p>{{ $page->content }}</p>
                </div>
                <div class="page-actions">
                    <a href="{{ route('admin.program-pelatihan-page.edit', $page->id) }}" class="btn btn-secondary btn-sm mr-2">Edit</a>
                    <form action="{{ route('admin.program-pelatihan-page.destroy', $page->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>

<!-- Tambahkan Bootstrap JS dan dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var el = document.getElementById('page-list');
        var sortable = Sortable.create(el, {
            onEnd: function (evt) {
                // Kirim data urutan baru ke server
                var items = Array.from(el.children).map(child => child.getAttribute('data-id'));
                fetch('{{ route('admin.program-pelatihan-page.updateOrder') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ order: items })
                }).then(response => response.json())
                  .then(data => {
                      console.log('Order updated:', data);
                  }).catch(error => {
                      console.error('Error:', error);
                  });
            }
        });
    });
</script>
</body>
</html>
