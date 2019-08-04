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
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="box-body">                                    
                <label for="proveedor">Proveedor</label>
                <p>{{$ingreso->nombre}} </p>  
            </div>
        </div>  
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="box-body">
              <label for="">Tipo Comprobante</label>
             <p>{{$ingreso->tipo_comprobante}}</p>
            </div>
       </div>
       <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="box-body">                                    
                <label for="serie_comprobante">Serie Comprobante</label>
                <p>{{$ingreso->serie_comprobante}} </p>
            </div>
       </div>
       <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="box-body">                                    
                <label for="num_comprobante">Número Comprobante</label>
                <p>{{$ingreso->num_comprobante}} </p>
            </div>
       </div>
       <div class="panel panel-footer">
        <table class="table table-borderd">
            <thead style="background-color:#A9D0F5">
                <tr>
                    <th>Articulo</th>
                    <th>Cantidad</th>
                    <th>Precio Compra</th>
                    <th>Precio Venta</th>
                    <th>Subtotal</th>
            
                </tr>
            </thead>
            <tbody>
                @foreach ($detalles as $det)
                    <tr>
                        
                        <td>{{$det->articulo}}</td>
                        <td>{{$det->cantidad}}</td>
                        <td>{{$det->precio_compra}}</td>
                        <td>{{$det->precio_venta}}</td>
                        <td>{{$det->cantidad*$det->precio_compra}}</td>
                                   
                    </tr> 
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                            <th></th>
                            <th></th>
                            <th><h4>TOTAL</h4></th>
                            <th><h4 id="total">{{$ingreso->total}}</h4></td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection