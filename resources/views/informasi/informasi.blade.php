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
                    <h1><span>PROGRAM & MATERI</span></h1>
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
                  <h3 style="text-align: left" class="vc_custom_heading"><strong>PROGRAM & MATERI PELATIHAN</strong></h3>
                  <div class="separator normal"></div>
                  <div class="wpb_text_column wpb_content_element vc_custom_1516615583178">
                    <div class="wpb_wrapper">
                        <ul id="page-list" class="list-group">
                            @foreach ($informasi_pages as $page)
                              <li class="list-group-item page-item mb-4" data-id="{{ $page->id }}">
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
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var el = document.getElementById('page-list');
        var sortable = Sortable.create(el, {
            onEnd: function (evt) {
                var items = Array.from(el.children).map(child => child.getAttribute('data-id'));
                fetch('{{ route('admin.informasi-page.updateOrder') }}', {
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
