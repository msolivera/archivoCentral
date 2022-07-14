<div class="col-12">
    <div class="card" style="background-color: #E6EFF6;">
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <h3 class="card-title">Ideologias</h3>
                </div>
                <div class="col-4">
                    <button style="float: right; padding: 15px;" class="btn btn-xs btn-warning"
                        data-toggle="modal" data-target="#IdeologiaModal"><i
                            class="fa fa-regular fa-plus"></i></button>
                </div>
            </div>
            <table id="ideologiaTable" class="table table-bordered table-striped table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ideologias</th>
                        <th>Observación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fichasIdeologias as $fichaIdeologia)
                        <tr>
                            <td>{{ $fichaIdeologia->id }}</td>
                            <td>{{ $fichaIdeologia->ideologia->nombre }}</td>
                            <td>{{ $fichaIdeologia->observacion }}</td>
                            <td>
                                <form method="POST"
                                    action="{{ route('fichasPersonalesIdeologia.destroy', $fichaIdeologia->id) }}"
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

<div class="modal fade" id="IdeologiaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="{{ route('fichasPersonalesIdeologia.store', $fichaPer) }}">
                {{ csrf_field() }}
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">

                                <div class="col-md-6" style="display: inline-block;">

                                    <div class="form-group">
                                        <label for="ideologia">Ideologia</label>
                                        <select name="ideologia" class="form-control select2" style="width: 100%;"
                                            id="ideologia">
                                            <option value=""> Seleccione </option>
                                            @foreach ($ideologias as $ideologia)
                                                <option value="{{ $ideologia->id }}">
                                                    {{ $ideologia->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="observacion">Observación</label>
                                        <input name="observacion" type="imput" class="form-control" id="observacion"
                                            placeholder="..." value="{{ old('observacion') }}">
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
            $("#ideologiaTable").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
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