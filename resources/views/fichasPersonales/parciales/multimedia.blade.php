<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">

            <h5 class="card-title">Agregar Contenido Multimedia</h5>
        </div>
        <div class="card-body">
            <div id="actions" class="row">
                <div class="col-lg-6">
                    <div class="btn-group w-100">
                        <span class="btn btn-success col fileinput-button">
                            <i class="fas fa-plus"></i>
                            <span>Añadir archivos Multimedia</span>
                        </span>
                        <button type="submit" class="btn btn-primary col start">
                            <i class="fas fa-upload"></i>
                            <span>Iniciar subida masiva de archivos</span>
                        </button>
                        <button type="reset" class="btn btn-warning col cancel">
                            <i class="fas fa-times-circle"></i>
                            <span>Cancelar subida masiva de archivos</span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center">
                    <div class="fileupload-process w-100">
                        <div id="total-progress" class="progress progress-striped active" role="progressbar"
                            aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                            <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table table-striped files" id="previews">
                <div id="template" class="row mt-2">
                    <div class="col-auto">
                        <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                    </div>
                    <div class="col d-flex align-items-center">
                        <p class="mb-0">
                            <span class="lead" data-dz-name></span>
                            (<span data-dz-size></span>)
                        </p>
                        <strong class="error text-danger" data-dz-errormessage></strong>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0"
                            aria-valuemax="100" aria-valuenow="0">
                            <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto d-flex align-items-center">
                        <div class="btn-group">
                            <button class="btn btn-primary start">
                                <i class="fas fa-upload"></i>
                                <span>Iniciar</span>
                            </button>
                            <button data-dz-remove class="btn btn-warning cancel">
                                <i class="fas fa-times-circle"></i>
                                <span>Cancelar</span>
                            </button>
                            <button data-dz-remove class="btn btn-danger delete">
                                <i class="fas fa-trash"></i>
                                <span>Eliminar</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- /.card -->
</div>



<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h4 class="card-title">Contenido Relacionado</h4>
        </div>
        <div class="gallery-photos" data-masonry='{"itemSelector: ".grid-item", "columnWidth": 200}'>
            @foreach ($fichaPer->photos as $photo)
                <div class="col-sm-6" style= "margin: 0px; img-fluid">
                    <object data="{{ url($photo->url) }}" class="img-responsive"  alt="" width="200"
                        height="150"></object>
                </div>
            @endforeach
        </div>

    </div>
</div>

@push('styles')
    <link rel="stylesheet" href="/adminLTE/plugins/dropzone/min/dropzone.min.css">
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="/adminLTE/plugins/ekko-lightbox/ekko-lightbox.css">
    <link rel="stylesheet" href="../../resources/css/carousel.css">
@endpush

@push('scripts')
    <script src="/adminLTE/plugins/dropzone/min/dropzone.min.js"></script>
    <!-- Ekko Lightbox -->
    <script src="/adminLTE/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
    <script src="../../resources/js/corousel.js"></script>
    <script>
        $(function() {


            // DropzoneJS Code Start
            Dropzone.autoDiscover = false

            // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
            var previewNode = document.querySelector("#template")
            previewNode.id = ""
            var previewTemplate = previewNode.parentNode.innerHTML
            previewNode.parentNode.removeChild(previewNode)

            var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
                url: '/photos/' + {{ $fichaPer->id }},
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                paramName: 'archivo',

                thumbnailWidth: 80,
                thumbnailHeight: 80,
                parallelUploads: 20,
                previewTemplate: previewTemplate,
                autoQueue: false, // Make sure the files aren't queued until manually added
                previewsContainer: "#previews", // Define the container to display the previews
                clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
            })

            myDropzone.on("addedfile", function(file) {
                // Hookup the start button
                file.previewElement.querySelector(".start").onclick = function() {
                    myDropzone.enqueueFile(file)
                }
            })

            // Update the total progress bar
            myDropzone.on("totaluploadprogress", function(progress) {
                document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
            })

            myDropzone.on("sending", function(file) {
                // Show the total progress bar when upload starts
                document.querySelector("#total-progress").style.opacity = "1"
                // And disable the start button
                file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
            })

            // Hide the total progress bar when nothing's uploading anymore
            myDropzone.on("queuecomplete", function(progress) {
                document.querySelector("#total-progress").style.opacity = "0"
            })

            // Setup the buttons for all transfers
            // The "add files" button doesn't need to be setup because the config
            // `clickable` has already been specified.
            document.querySelector("#actions .start").onclick = function() {
                myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
            }
            document.querySelector("#actions .cancel").onclick = function() {
                myDropzone.removeAllFiles(true)
            }
            // DropzoneJS Demo Code End
            myDropzone.on('error', function(file, res) {
                var msg = res.archivo[0];
                $('.dz-error-message > span').text(msg);

            })
        });
    </script>
    <script>
        $(function() {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });


        })
    </script>
@endpush
