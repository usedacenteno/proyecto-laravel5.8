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
                    <h3 class="box-title">Editar articulo</h3>
                    <a href="{{route('vista_articulo')}}" class="btn btn-info btn-sm pull-right">Listado</a>
                </div>
            </div>
        </div>
</div> 
    <form action="{{route('actualizar_articulo', ['id'=>$data->id])}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off" enctype="multipart/form-data">
         @method("PUT")
         @csrf 
        <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="box-body">                                    
                             <label for="nombre">Nombre</label>
                             <input type="text" name="nombre" class="form-control" value="{{ $data->nombre ?? ''}}"  required>
                        </div>
                 </div>
                 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                   <div class="box-body">
                      <label for="">Categoria</label>
                                 <select name="categoria_id" id="" class="form-control">
                         @foreach ($categorias as $cat)
                          @if($cat->id==$data->categoria_id)
                            <option value="{{$cat->id}}" selected>{{$cat->nombre}}</option>
                            @else 
                            <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                            @endif 
                        @endforeach 
                      </select>
                   </div>
                 </div>
                 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                         <div class="box-body">                                    
                               <label for="codigo">Código</label>
                                <input type="text" name="codigo" class="form-control" value="{{ $data->codigo ?? ''}}" required>
                         </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                      <div class="box-body">                                    
                              <label for="stock">Stock</label>
                              <input type="text" name="stock" class="form-control" value="{{ $data->stock ?? ''}}" required>
                     </div>
                 </div>
                 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                      <div class="box-body">                        
                          <label for="descripcion">Descripción</label>
                          <input type="text" name="descripcion" class="form-control" value="{{ $data->descripcion ?? ''}}" >
                      </div>
                 </div>
                 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="box-body">                        
                             <label for="imagen">Imagen</label>
                             <input type="file" name="imagen" class="form-control">
                             @if(($data->imagen)!="")
                             <img src="{{asset('imagenes/articulos/'.$data->imagen)}}" alt="" height="200px" width="200px">
                             @endif
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