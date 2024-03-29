<div class="col-12">
    <div class="card" style="background-color: #E6EFF6;">
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <h3 class="card-title">Dossier Relacionados</h3>
                </div>
                <div class="col-4">
                    <a style="float: right; padding: 15px;"
                        href="/dossierRelacionada/{{ $fichaImpersonal->id }}/{{ $fichaImpersonal->tipo }}"
                        class="btn btn-xs btn-info"><i class="fa fa-regular fa-plus"></i></a>
                </div>
            </div>
            <table id="dossierTable" class="table table-bordered table-striped table-sm">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Letra</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dossierAgregados as $dossier)
                        <tr>
                            <td>
                                {{ $dossier->titulo }}
                            </td>
                            <td>
                                {{ $dossier->letra }}
                            </td>
                            <td>
                                <form method="POST" action="{{ route('dossierRelacionada.destroy', $fichaImpersonal->id)}}"
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

</div>

@push('scripts')
    <script>
        $(function() {
            $("#dossierTable").DataTable({

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
