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
                    <h3 class="box-title">Nuevo Ingreso</h3>
                    <a href="{{route('vista_ingreso')}}" class="btn btn-info btn-sm pull-right"> Volver</a>
                </div>
            </div>
        </div>
</div>    
<form action="{{route('guardar_ingreso')}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
   <div class="row">
      <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
              <div class="box-body">                                    
                  <label for="proveedor">Proveedor</label>
                  <select name="proveedor_id" id="proveedor_id" class="form-control">
                      @foreach ($personas as $persona)
                          <option value="{{$persona->id}}">{{$persona->nombre}}</option>
                      @endforeach
                </select> 
              </div>
      </div>
      
    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
         <div class="box-body">
           <label for="">Tipo Comprobante</label>
           <select name="tipo_comprobante" id="" class="form-control">
                  <option value="Boleta">Boleta</option>
                  <option value="Factura">Factura</option>
                  <option value="Ticket">Ticket</option> 
            </select>
         </div>
    </div>
    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="box-body">                                    
                    <label for="serie_comprobante">Serie Comprobante</label>
                    <input type="text" name="serie_comprobante" class="form-control" value="{{old('serie_comprobante')}}" placeholder="Serie de Comprobante ..."/>
             </div>
    </div>
    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="box-body">                                    
                    <label for="num_comprobante">Número Comprobante</label>
                    <input type="text" name="num_comprobante" class="form-control" value="{{old('num_comprobante')}}" placeholder="Numero Comprobante..." required/>
           </div>
    </div>
</div>
<div class="row">
    <div class="panel panel-primary">
        <div class="panel-body"> 
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="box-body">
                    <label for="">Artículo</label>
                    <select name="pidarticulo" class="form-control selectpicker" id="pidarticulo">
                            @foreach ($articulos as $articulo)
                            <option value="{{$articulo->id}}">{{$articulo->articulo}}</option>
                        @endforeach <!--falta agregar un select boostrap descargar-->
                    </select>
                 
                </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
               <div class="box-body">
                   <label for="cantidad">Cantidad</label>
                   <input type="number" name="pcantidad" id="pcantidad" class="form-control"
                   placeholder="Cantidad">
               </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
               <div class="box-body">
                   <label for="precio_compra">Precio Compra</label>
                   <input type="number" name="pprecio_compra" id="pprecio_compra" class="form-control"
                   placeholder="P. compra">     
               </div>
             </div>
             <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                  <div class="box-body">
                        <label for="precio_venta">Precio Venta</label>
                        <input type="number" name="pprecio_venta" id="pprecio_venta" class="form-control"
                        placeholder="P. Venta">  
                  </div>
             </div>
             <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="box-body">
                       <button type="button" id="bt_add" class="btn btn-primary ">Agregar</button>  
                    </div>
             </div>
               <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color:#A9D0F5">
                            <th>Opciones</th>
                            <th>Articulo</th>
                            <th>Cantidad</th>
                            <th>Precio Compra</th>
                            <th>Precio Venta</th>
                            <th>Subtotal</th>
                        </thead>
                        <tfoot>
                            <th>TOTAL</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><h4 id="total">C$.0.00</h4></th>
                        </tfoot>
                        <tbody>

                        </tbody>
                    </table>
               </div>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
            <div class="box-body">
                @csrf
                    @include('includes.boton-form-crear')
            
            </div>
    </div>
</div>

</form>
@push('scripts')
    <script>
        $(document).ready(function(){
            $('#bt_add').click(function(){
                agregar();
            });
        });

        var cont=0;
        total=0;
        subtotal=[]; 
        $("#guardar").hide();
        function agregar()
        {
            articulo_id=$("#pidarticulo").val();
            articulo=$("#pidarticulo option:selected").text();
            cantidad=$("#pcantidad").val();
            precio_compra=$("#pprecio_compra").val();
            precio_venta=$("#pprecio_venta").val();

            if( articulo_id!="" && cantidad!="" && cantidad>0 && precio_compra!="" && precio_venta!="")
            {
            subtotal[cont]=(cantidad*precio_compra);
            total=total+subtotal[cont];

            var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="articulo_id[]" value="'+articulo_id+'">'+articulo+'</td><td><input type="number" name"cantidad[]" value="'+cantidad+'"></td><td><input type="number" name"precio_compra[]" value="'+precio_compra+'"></td><td><input type="number" name"precio_venta[]" value="'+precio_venta+'"></td><td>'+subtotal[cont]+'</td></tr>';
            cont++;
            limpiar();
            $("#total").html("C$."+ total);
            evaluar();
            $("#detalles").append(fila);
            }
            else
            {
                alert("Error al ingresar el datalle del ingreso, revise los datos de los articulos");
            }
        }

  function limpiar(){
      $("#pcantidad").val("");
      $("#pprecio_compra").val("");
      $("#pprecio_venta").val("");
  }
  function evaluar(){
      if (total>0)
      {
          $("#guardar").show();
      }
      else
      {
        $("#guardar").hide(); 
      }
      function eliminar(index){
          total=total-subtotal[index];
          $("#total").html("C$."+ total);
          $("#fila"+index).remove();
          evaluar();
      }
  }

    </script>
@endpush
@endsection