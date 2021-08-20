<div>
    @include('livewire.genero.create')
    {{-- @include('livewire.genero.update')  --}}

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="d-flex bd-highlight">
                    <div class="p-4 flex-grow-1 bd-highlight">
                        <h4>Generos</h4>
                    </div>

                    <div class="p-4 bd-highlight">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Registrar
                        </button>
                    </div>

                </div>
                <hr>
                <div class="card-body">
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
                                @foreach ($generos as $genero)
                                <tr>
                                    <td>{{ $genero->id }}</td>
                                    <td>{{ $genero->nombre }}</td>
                                    <td>{{ $genero->created_at }}</td>
                                    <td>
                                        <button class="btn btn-primary bt-sm"><i class="icon-pencil"></i></button>
                                        <button class="btn btn-danger bt-sm"><i class="icon-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Fecha creación</th>
                                    <th>Accion</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

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
