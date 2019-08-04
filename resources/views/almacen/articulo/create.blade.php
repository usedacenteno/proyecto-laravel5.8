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
                    <h3 class="box-title">Nuevo Articulo</h3>
                    <a href="{{route('vista_articulo')}}" class="btn btn-info btn-sm pull-right">Listado</a>
                </div>
            </div>
        </div>
</div>    
<form action="{{route('guardar_articulo')}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
   <div class="row">
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="box-body">                                    
                  <label for="nombre">Nombre</label>
                  <input type="text" name="nombre" class="form-control" value="{{old('nombre', $data->nombre ?? '')}}" placeholder="Ingrese el Nombre..." required>
              </div>
      </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
         <div class="box-body">
           <label for="">Categoria</label>
           <select name="categoria_id" id="" class="form-control">
              @foreach ($categorias as $cat)
                  <option value="{{$cat->id}}">{{$cat->nombre}}</option>
              @endforeach 
            </select>
         </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="box-body">                                    
                    <label for="codigo">Código</label>
                    <input type="text" name="codigo" class="form-control" value="{{old('codigo', $data->codigo ?? '')}}" placeholder="Ingrese el Código..." required>
             </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="box-body">                                    
                    <label for="stock">Stock</label>
                    <input type="text" name="stock" class="form-control" value="{{old('stock', $data->stock ?? '')}}" placeholder="Ingrese el stock..." required>
           </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="box-body">                        
                <label for="descripcion">Descripción</label>
                <input type="text" name="descripcion" class="form-control" value="{{old('descripcion')}}" placeholder="Descripción del articulo...">
            </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="box-body">                        
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" class="form-control">
            </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="box-footer">
                    @include('includes.boton-form-crear')
            
            </div>
    </div>
</div>

</form> 
@endsection