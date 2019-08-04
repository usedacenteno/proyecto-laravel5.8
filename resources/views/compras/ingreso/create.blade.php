@extends("theme.$theme.layout")
@section('titulo')
    Sistemas de ventas
@endsection
@section('contenido')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
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
<form action="{{route('guardar_ingreso')}}" class="form-horizontal" method="POST" autocomplete="off">
    {{csrf_field()}}
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
       <div class="panel panel-footer">
        <table class="table table-borderd">
            <thead>
                <tr>
                    <th>Articulo</th>
                    <th>Cantidad</th>
                    <th>Precio Compra</th>
                    <th>Precio Venta</th>
                    <th>Subtotal</th>
                    <th><a href="#" class="addRow"><i class="fa fa-plus"></i></a></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                            <select name="articulo_id[]" class="form-control selectpicker">
                                    @foreach ($articulos as $articulo)
                                    <option value="{{$articulo->id}}">{{$articulo->articulo}}</option>
                                @endforeach
                            </select>
                        
                    </td>
                    <td>
                        <input type="text" name="cantidad[]" class="form-control quantity" required="">
                    </td>
                    <td>
                        <input type="text" name="precio_compra[]" class="form-control budget" required="">
                    </td>
                    <td>
                         <input type="text" name="precio_venta[]" class="form-control " required="">
                    </td>
                    <td>
                        <input type="text" name="subtotal[]" class="form-control amount" required="">
                    </td>
                    <td>
                        <a href="#" class=" remove btn btn-danger "><i class="fa fa-close (alias)"></i></a>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td style="border: none"></td>
                    <td style="border: none"></td>
                    <td style="border: none"></td>
                    <td>Total</td>
                    <td> <b class="total"></b></td>
                    <td><input type="submit" name="" value="Guardar" class=" btn btn-success"></td>
                </tr>
            </tfoot>
        </table>
    </div>
   
   

</form>
@push('scripts')

<script type="text/javascript">
    $('tbody').delegate('.quantity','.budget','keyup', function(){
       var tr=$(this).parent().parent();
       var cantidad=tr.find('.quantity').val();
       var precio_compra=tr.find('.budget').val();
       var subtotal=(cantidad*precio_compra);
       tr.find('.amount').val(subtotal);
       total();
     });
    function total(){
        var total=0;
        $('.amount').each(function(i,e){
         var subtotal=$(this).val()-0;
        total +=subtotal;
        });
       $('.total').html(total+".00 C$");
    }
     $('.addRow').on('click',function(){
         addRow();
     });
    
     function addRow()
     {
         var tr='<tr>'+'<td> <select name="articulo_id[]" class="form-control selectpicker" id="articulo">@foreach ($articulos as $articulo)<option value="{{$articulo->id}}">{{$articulo->articulo}}</option>@endforeach</select></td>'+
                       '<td><input type="text" name="cantidad[]" class="form-control quantity" required=""></td>'+
                       '<td><input type="text" name="precio_compra[]" class="form-control budget" required=""></td>'+
                       '<td><input type="text" name="precio_venta[]" class="form-control" required=""></td>'+
                       '<td><input type="text" name="subtotal[]" class="form-control amount" required=""></td>'+
                       '<td><a href="#" class="btn btn-danger remove"><i class="fa fa-close (alias)"></i></a></td>'+
                 '</tr>';
         $('tbody').append(tr);
     };
     $('.remove').live('click',function(){
          var last=$('tbody tr').length;
          if(last==1){
              alert("no se puede eliminar la ultima fila");
          }
          else{
             $(this).parent().parent().remove();
          }
         
      });
     
    </script>
@endpush
@endsection