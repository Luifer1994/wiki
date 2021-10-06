@extends('plantilla.plantilla')
@section('content')

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Actualizar articulo</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('articulo.update') }}">
                @method("PUT")
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="articulo" value="{{ $articulo->id }}">
                    <div class="form-group">
                        <input type="text" class="form-control" name="titulo" value="{{ $articulo->titulo }}"
                            placeholder="Titulo">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="id_sub_categoria">
                            @foreach ($subCategorias as $subCategoria)
                                <option value="{{ $subCategoria->id }}"
                                    {{ $articulo->id_sub_categoria == $subCategoria->id ? 'selected' : '' }}>
                                    {{ $subCategoria->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" wire:ignore>
                        <textarea id="summernote" class="form-control summernote" name="contenido"
                            rows="10">{{ $articulo->contenido }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('articulos') }}" type="button" class="btn btn-danger close-btn"
                        data-dismiss="modal">Cancelar</a>
                    <button type="submit" class="btn btn-primary close-modal">Guardar</button>
                </div>
            </form>
        </div>
    </div>



    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
