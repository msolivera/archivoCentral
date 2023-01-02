<div class="col-12">

    <div class="card" style="background-color: #E6EFF6;">
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <h3 class="card-title">Fichas impersonales relacionadas</h3>
                </div>
                <div class="col-4">
                    <a style="float: right; padding: 15px;"
                        href="/fichaImpersonalRelacionada/{{ $dossier->id }}/{{ $dossier->tipo }}"
                        class="btn btn-xs btn-info"><i class="fa fa-regular fa-plus"></i></a>

                </div>
            </div>
            <table id="parientesTable" class="table table-bordered table-striped table-sm">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Clasificacion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fichasImpersonalesAgregadas as $fichaImper)
                        <tr>
                            <td>
                                {{ $fichaImper->nombre }}
                            </td>
                            <td>
                                {{ $fichaImper->clasificacion->nombre }}
                            </td>
                            <td>
                                <form method="POST" action="{{ route('fichaImpersonalRelacionada.destroy', $fichaImper->id)}}"
                                    style="display: inline">
                                    {{ csrf_field() }}
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

@push('scripts')
    <script>
        $(function() {
            $("#parientesTable").DataTable({

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

            }).buttons().container().appendTo('#example1_wrapper .col-sm-6:eq(0)');
        });
    </script>
@endpush