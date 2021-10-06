<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-tittle">Artículos</h5>
                    <br>
                    <div class="row">
                        <div class="col-8 col-lg-10">
                            <input wire:model="searh" class="form-control" type="search" placeholder="Buscar"
                                aria-label="Search">
                        </div>
                        <div class="col col-sm-1">
                            <button type="button" class="btn btn-google d-lg-none" data-toggle="modal"
                                data-target="#exampleModal">
                                <i class="fa fa-plus color-primary"></i>
                            </button>
                        </div>
                        <div class="d-none d-lg-block">
                            <a href="{{ route('articulo.create') }}" type="button" class="btn btn-google">
                                Agregar
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <hr>
                        <table class="table table-striped display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Titulo</th>
                                    <th>Sub Categoría</th>
                                    <th>Fecha creación</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody class="text-dark">
                                @if ($articulos->count() > 0)
                                    @foreach ($articulos as $key => $articulo)
                                        <tr>
                                            <td>{{ $articulo->id }}</td>
                                            <td>{{ $articulo->titulo }}</td>
                                            <td>{{ $articulo->nombreSubCategoria }}</td>
                                            <td>{{ Str::ucfirst($articulo->created_at->isoFormat('LLLL')) }}</td>
                                            <td>
                                                <a class="btn btn-primary btn-sm"
                                                    href={{ route('articulo.edit', $articulo->id) }}>
                                                    <i class="icon-pencil"></i>
                                                </a>
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="Delete(this, {{ $articulo->id }})">
                                                    <i class="icon-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                @else
                                    <div class="text-center">
                                        <p class="text-danger">No hay resultados</p>
                                    </div>
                                @endif

                            </tbody>
                        </table>
                    </div>
                    <nav>
                        <ul class="pagination pagination-gutter">
                            {{ $articulos->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <script>
        function Delete(elmnt, id) {
            Swal.fire({
                title: 'Quiere eliminar este registro?',
                text: "Despues de que elimine el registro no podra recuperarlo!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('delete', id);
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Eliminado!', 'El registro fue eliminado con exito.', 'success'
                        )
                    }
                }
            })
        }
    </script>
    <script type="text/javascript">
        window.livewire.on('categoriaStore', () => {
            $('#register').modal('hide');
        });
    </script>

</div>
