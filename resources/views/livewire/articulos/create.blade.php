@extends('plantilla.plantilla')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Registrar articulo</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('articulo.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input value="{{ old('titulo') }}" type="text" class="form-control" name="titulo"
                            placeholder="Titulo">
                        @error('titulo') <span class="text-danger error">Campo requerido</span>@enderror
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="id_sub_categoria">
                            <option value="">Selecciona</option>
                            @foreach ($subCategorias as $subCategoria)
                                <option value="{{ $subCategoria->id }}"
                                    {{ old('id_sub_categoria') == $subCategoria->id ? 'selected' : '' }}>
                                    {{ $subCategoria->nombre }}</option>
                            @endforeach
                        </select>
                        @error('id_sub_categoria') <span class="text-danger error">Campo requerido</span>@enderror
                    </div>
                    <div class="form-group" wire:ignore>
                        <textarea id="summernote" class="form-control summernote" name="contenido"
                            rows="10">{{ old('contenido') }}</textarea>
                        @error('contenido') <span class="text-danger error">Campo requerido</span>@enderror
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
