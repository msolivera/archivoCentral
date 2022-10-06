<div class="col-12">
    <div class="card" style="background-color: #E6EFF6;">
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <h3 class="card-title">Anotaciones</h3>
                </div>
                <div class="col-4">
                    <button style="float: right; padding: 15px;" class="btn btn-xs btn-warning"
                        data-toggle="modal" data-target="#anotacionesModal"><i
                            class="fa fa-regular fa-plus"></i></button>
                </div>
            </div>
            <table id="anotacionesTable" class="table table-bordered table-striped table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Anotacion</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fichasAnotaciones as $fichaAnotacion)
                        <tr>
                            <td>{{ $fichaAnotacion->id }}</td>
                            <td>{{ $fichaAnotacion->nombre }}</td>
                            <td>{{ $fichaAnotacion->tipoAnotacion->nombre }}</td>

                            <td>
                                <form method="POST"
                                    action="{{ route('anotacion.destroy', $fichaAnotacion->id) }}"
                                    style="display: inline"> {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-xs btn-danger"
                                        onclick="return confirm('¿Esta seguro que desea elminirar este registro?')"><i
                                            class="fa fa-light fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<div class="modal fade" id="anotacionesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <form method="POST" action="{{ route('anotacion.store', $fichaPer) }}">
        {{ csrf_field() }}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Anotaciones</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nombre">Texto</label>
                    <input name="nombre" type="imput" class="form-control" id="nombre" placeholder="..."
                        value="{{ old('nombre') }}">
                </div>
                <div class="form-group">
                    <label for="tipo_anotacion">Tipo de Anotacion</label>
                    <select name="tipo_anotacion" class="form-control select2" style="width: 100%;"
                        id="tipo_anotacion">
                        <option value=""> Seleccione </option>
                        @foreach ($tipoAnotaciones as $tipoAnotacion)
                            <option value="{{ $tipoAnotacion->id }}">
                                {{ $tipoAnotacion->nombre }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </form>
</div>
</div>

@push ('scripts')
<script>
    $(function() {
            $("#anotacionesTable").DataTable({

                buttons: [{
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis'
                ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
</script>
@endpush