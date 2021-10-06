<div>
    @include('livewire.genero.create')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-tittle">Generos</h5>
                    <br>
                    <div class="row">
                        <div class="col-8 col-lg-8 col-md-8">
                            <input wire:model="searh" class="form-control" type="search" placeholder="Buscar" aria-label="Search">
                        </div>
                        <div class="col col-sm-1">
                            <button type="button" class="btn btn-google d-lg-none" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-plus color-primary"></i>
                            </button>
                        </div>
                        <div class="d-none d-lg-block d-md-block">
                            <button type="button" class="btn btn-google" data-toggle="modal" data-target="#exampleModal">
                                <span class="btn-icon-left" style="color: rgb(24, 83, 245)">
                                    <i class="fa fa-plus color-google"></i>
                                </span>agregar
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Fecha creación</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody class="text-dark">
                                @if ($generos->count() > 0)
                                @foreach ($generos as $key => $genero)
                                <tr>
                                    <td>{{$genero->id }}</td>
                                    <td>{{ $genero->nombre }}</td>
                                    <td>{{ Str::ucfirst($genero->created_at->isoFormat('LLLL')) }}</td>
                                    <td>
                                        <button wire:click='edit({{ $genero->id }})' class="btn btn-primary btn-sm" data-toggle="modal" data-target="#update">
                                            <i class="icon-pencil"></i>
                                        </button>
                                        @include('livewire.genero.update')
                                        <button class="btn btn-danger btn-sm" onclick="Delete(this, {{ $genero->id }})">
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
                            {{ $generos->links() }}
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
        window.livewire.on('generoStore', () => {

            $('#register').modal('hide');
        });
    </script>
</div>



