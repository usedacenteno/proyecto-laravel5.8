@extends("theme.$theme.layout")
@section('titulo')
    Sistemas de ventas
@endsection
@section('contenido')
<div class="row">
        <div class="col-lg-12">
            @include('includes.form-error')
            @include('includes.mensaje')
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Crear Categorias</h3>
                    <a href="{{route('vista_categoria')}}" class="btn btn-info btn-sm pull-right">Listado</a>
                </div>
                <form action="{{route('guardar_categoria')}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off">
                    @csrf
                    <div class="box-body">
                            <div class="box-body">
                                    
                                   <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" value="{{old('nombre', $data->nombre ?? '')}}" required>
                                </div>
                                <div class="box-body">                        
                                        <label for="descripcion">Descripción</label>
                                    <input type="text" name="descripcion" class="form-control" value="{{old('descripcion', $data->descripcion ?? '')}}" required>
                                    
                                </div>
                    </div>
                    <div class="box-footer">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            @include('includes.boton-form-crear')
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> 
@endsection