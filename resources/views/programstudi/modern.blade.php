@extends('layout.index')

@section('content')
  <div class="content">
    <div class="content_inner">

      <div class="title title_on_bottom with_image">
        <div class="full_width">
            <div class="image responsive" style="display:flex; justify-content:center;">
              <img src="{{ asset('assets/wp-content/uploads/foto/LPKS.png') }}" style="width: 100%; height: auto;" />
            </div>
          </div>
        <div class="title_holder">
          <div class="container">
            <div class="container_inner clearfix">
              <div class="title_on_bottom_wrap">
                <div class="title_on_bottom_holder">
                  <div class="title_on_bottom_holder_inner">
                    <h1><span>MODERN FUSION FOOD</span></h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="container_inner clearfix">
          <div class="vc_row wpb_row" style="text-align:left;">
            <div class="wpb_column vc_column_container vc_col-sm-12">
              <div class="vc_column-inner">
                <div class="wpb_wrapper">
                  <div class="separator normal"></div>

                  <div class="wpb_text_column wpb_content_element vc_custom_1516615583178">
                    <div class="wpb_wrapper">
                      <ul id="page-list" class="list-group">
                        @foreach ($modern_pages as $page)
                          <li class="list-group-item page-item mb-4" data-id="{{ $page->id }}">
                            <div class="image-responsive" style="display: flex; justify-content: center; margin-bottom: 20px;">
                                @if ($page->foto)
                                  <img src="{{ asset('storage/' . $page->foto) }}" alt="Foto" style="width: 50%; height: auto;" />
                                @endif
                              </div>
                            <h4><strong>{{ $page->title }}</strong></h4>
                            @if (str_contains($page->content, '-list-'))
                              <ul>
                                @foreach (explode('-list-', $page->content) as $contentItem)
                                  <li>{{ trim($contentItem) }}</li>
                                @endforeach
                              </ul>
                            @elseif (str_contains($page->content, '-enter-'))
                              @foreach (explode('-enter-', $page->content) as $contentItem)
                                <p>{{ trim($contentItem) }}</p>
                              @endforeach
                            @elseif (str_contains($page->content, '-space-'))
                              {!! nl2br(e(str_replace('-space-', "\n", $page->content))) !!}
                            @else
                              <p>{{ $page->content }}</p>
                            @endif
                          </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection

<!-- Tambahkan SortableJS dan script untuk drag-and-drop -->
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var el = document.getElementById('page-list');
        var sortable = Sortable.create(el, {
            onEnd: function (evt) {
                var items = Array.from(el.children).map(child => child.getAttribute('data-id'));
                fetch('{{ route('admin.profile-page.updateOrder') }}', {
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
@endsection
