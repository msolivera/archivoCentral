<div class="col-12">
    <div class="card" style="background-color: #E6EFF6;">
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <h3 class="card-title">Roles y Organizaciones</h3>
                </div>
                <div class="col-4">
                    <button style="float: right; padding: 15px;" class="btn btn-xs btn-warning"
                        data-toggle="modal" data-target="#organizacionesModal"><i
                            class="fa fa-regular fa-plus"></i></button>
                </div>
            </div>
            <table id="organizacionTable" class="table table-bordered table-striped table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Organizacion</th>
                        <th>Observaciones</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fichasOrganizaciones as $fichaOrganizacion)
                        <tr>
                            <td>{{ $fichaOrganizacion->id }}</td>
                            <td>{{ $fichaOrganizacion->nombre }}</td>
                            <td>{{ $fichaOrganizacion->organizacion->nombre }}</td>
                            <td>{{ $fichaOrganizacion->observacion }}</td>
                            <td>
                                <form method="POST"
                                    action="{{ route('rolOrganizacion.destroy', $fichaOrganizacion->id) }}"
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

<div class="modal fade" id="organizacionesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <form method="POST" action="{{ route('rolOrganizacion.store', $fichaPer) }}">
        {{ csrf_field() }}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input name="nombre" type="imput" class="form-control" id="nombre" placeholder="..."
                        value="{{ old('nombre') }}">
                </div>
                <div class="form-group">
                    <label for="organizacion">Organizacion</label>
                    <select name="organizacion" class="form-control select2" style="width: 100%;"
                        id="organizacion">
                        <option value=""> Seleccione </option>
                        @foreach ($organizaciones as $organizacion)
                            <option value="{{ $organizacion->id }}">
                                {{ $organizacion->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="observacion">Observación</label>
                    <input name="observacion" type="imput" class="form-control" id="observacion"
                        placeholder="..." value="{{ old('observacion') }}">
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
            $("#organizacionTable").DataTable({

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