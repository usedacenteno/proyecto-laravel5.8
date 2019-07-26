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
                    <h3 class="box-title">Editar Cliente</h3>
                    <a href="{{route('vista_cliente')}}" class="btn btn-info btn-sm pull-right">Listado</a>
                </div>
            </div>
        </div>
</div> 
    <form action="{{route('actualizar_cliente', ['id'=>$data->id])}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off" >
         @method("PUT")
         @csrf 
         <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="box-body">                                    
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{old('nombre', $data->nombre ?? '')}}"required/>
                    </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="box-body">                                    
                  <label for="direccion">Dirección</label>
                  <input type="text" name="direccion" class="form-control" value="{{old('direccion',$data->direccion ?? '')}}"/>
              </div>
      </div>
          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="box-body">
                 <label for="">Documento</label>
                 <select name="tipo_documento" id="" class="form-control">
                     @if ($data->tipo_documento=='Cédula')
                        <option value="Cedula" selected>Cédula</option>
                        <option value="RUC">RUC</option>
                        <option value="PAS">PAS</option> 
                        @elseif ($data->tipo_documento=='RUC')
                        <option value="Cedula">Cédula</option>
                        <option value="RUC"selected>RUC</option>
                        <option value="PAS">PAS</option> 
                        @else 
                        <option value="Cedula">Cédula</option>
                        <option value="RUC">RUC</option>
                        <option value="PAS" selected>PAS</option>
                        @endif 
                  </select>
               </div>
          </div>
          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="box-body">                                    
                          <label for="num_documento">Número Documento</label>
                          <input type="text" name="num_documento" class="form-control" value="{{old('num_documento',$data->num_documento ?? '')}}"/>
                   </div>
          </div>
          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="box-body">                                    
                          <label for="telefono">Teléfono</label>
                          <input type="text" name="telefono" class="form-control" value="{{old('telefono',$data->telefono ?? '')}}" />
                 </div>
          </div>
          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="box-body">                        
                      <label for="email">Email</label>
                      <input type="text" name="email" class="form-control" value="{{old('email',$data->email ?? '')}}"/>
                  </div>
          </div>
          
          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="box-footer">
                          @include('includes.boton-form-editar')
                  
                  </div>
          </div>
      </div>
      
     </form>
           
@endsection