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
                    <h3 class="box-title">Nuevo Cliente</h3>
                    <a href="{{route('vista_cliente')}}" class="btn btn-info btn-sm pull-right"> Volver</a>
                </div>
            </div>
        </div>
</div>    
<form action="{{route('guardar_cliente')}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
   <div class="row">
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="box-body">                                    
                  <label for="nombre">Nombre</label>
                  <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" placeholder="Ingrese el Nombre..." required>
              </div>
      </div>
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="box-body">                                    
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" class="form-control" value="{{old('direccion')}}" placeholder="Ingrese la Dirección...">
        </div>
</div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
         <div class="box-body">
           <label for="">Documento</label>
           <select name="tipo_documento" id="" class="form-control">
                  <option value="Cedula">Cedula</option>
                  <option value="RUC">RUC</option>
                  <option value="PAS">PAS</option> 
            </select>
         </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="box-body">                                    
                    <label for="num_documento">Número Documento</label>
                    <input type="text" name="num_documento" class="form-control" value="{{old('num_documento')}}" placeholder="Número de Documeto ...">
             </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="box-body">                                    
                    <label for="telefono">Teléfono</label>
                    <input type="text" name="telefono" class="form-control" value="{{old('telefono')}}" placeholder="Teléfono..." >
           </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="box-body">                        
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" value="{{old('email')}}" placeholder="Email...">
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