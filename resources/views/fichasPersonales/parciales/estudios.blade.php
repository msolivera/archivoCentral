<div class="col-12">
    <div class="card" style="background-color: #E6EFF6;">
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <h3 class="card-title">Estudios</h3>
                </div>
                <div class="col-4">
                    <button style="float: right; padding: 15px;" class="btn btn-xs btn-warning"
                        data-toggle="modal" data-target="#estudiosModal"><i
                            class="fa fa-regular fa-plus"></i></button>
                </div>
            </div>
            <table id="estudiosTable" class="table table-bordered table-striped table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Completo</th>
                        <th>Instituto</th>
                        <th>Tipo Inst.</th>
                        <th>Nivel</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fichasEstudios as $fichaEstudio)
                        <tr>
                            <td>{{ $fichaEstudio->id }}</td>
                            <td>{{ $fichaEstudio->nombreEstudio }}</td>
                            <td>{{ $fichaEstudio->completado }}</td>
                            <td>{{ $fichaEstudio->nombreInstituto }}</td>
                            <td>{{ $fichaEstudio->tipoInstituto }}</td>
                            <td>{{ $fichaEstudio->nivelAcademico }}</td>
                            <td>
                                <form method="POST"
                                    action="{{ route('estudio.destroy', $fichaEstudio->id) }}"
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


<div class="modal fade" id="estudiosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <form method="POST" action="{{ route('estudio.store', $fichaPer) }}">
        {{ csrf_field() }}
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="estudioLabel"></h4>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-6" style="display: inline-block;">
                            <div class="form-group">
                                <label for="nombreEstudio">Nombre</label>
                                <input name="nombreEstudio" type="imput" class="form-control"
                                    id="nombreEstudio" placeholder="..." value="{{ old('nombreEstudio') }}">
                            </div>

                            <div class="form-group">
                                <label for="completado">Completo</label>
                                <select name="completado" class="form-control select2" style="width: 100%;"
                                    id="completado">
                                    <option value=""> Seleccione </option>
                                    <option value="SI"> SI </option>
                                    <option value="NO"> NO </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nombreInstituto">Instituto</label>
                                <input name="nombreInstituto" type="imput" class="form-control"
                                    id="nombreInstituto" placeholder="..."
                                    value="{{ old('nombreInstituto') }}">
                            </div>
                            <div class="form-group">
                                <label for="tipoInstituto">Tipo Inst.</label>
                                <select name="tipoInstituto" class="form-control select2" style="width: 100%;"
                                    id="tipoInstituto">
                                    <option value=""> Seleccione </option>
                                    <option value="Público"> Público </option>
                                    <option value="Privado"> Privado </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nivelAcademico">Nivel</label>
                                <select name="nivelAcademico" class="form-control select2" style="width: 100%;"
                                    id="nivelAcademico">
                                    <option value=""> Seleccione </option>
                                    <option value="Ciclo Basico"> Ciclo Basico </option>
                                    <option value="Bachillerato"> Bachillerato </option>
                                    <option value="Terciario"> Terciario </option>
                                    <option value="Grado"> Grado </option>
                                    <option value="Post Grado"> Post Grado </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>

@push('scripts')
<script>
    $(function() {
            $("#estudiosTable").DataTable({

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