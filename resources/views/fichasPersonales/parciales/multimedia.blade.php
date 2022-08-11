<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h5 class="card-title">Contenido Multimedia</h5>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="dropzone"></div>
            </div>

        </div>
    </div>
</div>
<div class="col-md-12">
    <article class="container">
        <label for="numeroPaquete">Contenido Relacionado:</label>
        @if ($fichaPer->photos->count() === 1)
            <figure><object data="{{ $fichaPer->photos->first()->url }}" class="img-responsive" alt=""
                    width="400" height="300"></object></figure>
        @elseif ($fichaPer->photos->count() > 1)
            <div class="gallery-photos" data-masonry='{"itemSelector: ".grid-item", "columnWidth": 464}'>
                @foreach ($fichaPer->photos as $photo)
                    <figure><object data="{{ url($photo->url) }}" class="img-responsive" alt="" width="400"
                            height="300"></object>
                    </figure>
                @endforeach
            </div>
        @endif

    </article>
</div>


@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@push('scripts')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script>
    var myDropzone = new Dropzone('.dropzone', {
        url: '/photos/' + {{ $fichaPer->id }},
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        paramName: 'archivo',
        dictDefaultMessage: 'Arrastre Archivos aquí'
    });


    myDropzone.on('error', function(file, res) {
        var msg = res.archivo[0];
        $('.dz-error-message > span').text(msg);
    })

    Dropzone.autoDiscover = false;
</script>
@endpush
