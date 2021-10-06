<div>
    @include('livewire.subCategoria.create')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-tittle">Sub Categorías</h5>
                    <br>
                    <div class="row">
                        <div class="col-8 col-lg-10">
                            <input wire:model="searh" class="form-control" type="search" placeholder="Buscar" aria-label="Search">
                        </div>
                        <div class="col col-sm-1">
                            <button type="button" class="btn btn-google d-lg-none" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-plus color-primary"></i>
                            </button>
                        </div>
                        <div class="d-none d-lg-block">
                            <button type="button" class="btn btn-google" data-toggle="modal" data-target="#exampleModal">
                                Agregar
                            </button>
                        </div>
                    </div>
                    {{-- <select name="" id="" wire:model="searh">
                        <option value="">Select</option>
                        @foreach ($categorias as $item)
                            <option value="{{$item->nombre}}">{{$item->nombre}}</option>
                        @endforeach
                    </select> --}}
                    <div class="table-responsive">
                        <hr>
                        <table class="table table-striped display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Categoría</th>
                                    <th>Fecha creación</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody class="text-dark">
                                @if ($subCategorias->count() > 0)
                                @foreach ($subCategorias as $key => $SubCategoria)
                                <tr>
                                    <td>{{$SubCategoria->id }}</td>
                                    <td>{{ $SubCategoria->nombre }}</td>
                                    <td>{{ $SubCategoria->nombreCategoria }}</td>
                                    <td>{{ Str::ucfirst($SubCategoria->created_at->isoFormat('LLLL')) }}</td>
                                    <td>
                                        <button wire:click='edit({{ $SubCategoria->id }})' class="btn btn-primary btn-sm" data-toggle="modal" data-target="#update">
                                            <i class="icon-pencil"></i>
                                        </button>
                                        @include('livewire.subCategoria.update')
                                        <button class="btn btn-danger btn-sm" onclick="Delete(this, {{ $SubCategoria->id }})">
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
                            {{ $subCategorias->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <script>
        function Delete(elmnt, id) {
            Swal.fire({
                title: 'Quiere eliminar este registro?'
                , text: "Despues de que elimine el registro no podra recuperarlo!"
                , icon: 'warning'
                , showCancelButton: true
                , confirmButtonColor: '#3085d6'
                , cancelButtonColor: '#d33'
                , confirmButtonText: 'Si, Eliminar!'
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
    @if(Session::has('mensaje'))
    <script>
        Command: toastr["success"]("{{ session('mensaje')}}")
        toastr.options = {
            "closeButton": false
            , "debug": false
            , "newestOnTop": false
            , "progressBar": false
            , "positionClass": "toast-bottom-right"
            , "preventDuplicates": false
            , "onclick": null
            , "showDuration": "300"
            , "hideDuration": "1000"
            , "timeOut": "5000"
            , "extendedTimeOut": "1000"
            , "showEasing": "swing"
            , "hideEasing": "linear"
            , "showMethod": "fadeIn"
            , "hideMethod": "fadeOut"
        }

    </script>
    @endif
    <script type="text/javascript">
        window.livewire.on('categoriaStore', () => {
            $('#register').modal('hide');
        });
    </script>
</div>


