@extends("theme.$theme.layout")
@section('titulo')
    Sistema de Venta
@endsection


@section('contenido')
<div class="row">
    <div class="col-lg-8 clo-md-8 col-sm-8 col-xs-12">
            @include('includes.mensaje')
        <div class="box box-primary">
            <div class="box-header with-border">
                    <h3>Listado de Ingresos <a href="{{route('crear_ingreso')}}"><button class="btn btn-success">Nuevo</button></a></h3>
                    @include('compras.ingreso.search')
            </div>
        </div>
    </div>
</div>
   
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class=" box-body table-responsive no-padding">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Proveedor</th>
                        <th>Comprobante-Serie</th>
                        <th>Núm. Comprobante</th>
                        <th>Impuesto</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                @csrf
               @foreach ($ingresos as $ing)
               <tr>
                   <td>{{$ing->created_at}}</td>
                   <td>{{$ing->nombre}}</td>
                   <td>{{$ing->tipo_comprobante.': '.$ing->serie_comprobante}}</td>
                   <td>{{$ing->num_comprobante}}</td>
                   <td>{{$ing->impuesto}}</td>
                   <td>{{$ing->total}}</td>
                   <td>{{$ing->estado}}</td>
                   <td>
                       <a href="{{route('mostrar_ingreso', ['id' => $ing->id])}}"><button class="btn btn-primary">Detalles</button></a>
                       <a href="{{route('eliminar_ingreso', ['id' => $ing->id])}}" class="eliminar-menu tooltipsC" title="Eliminar esta categoria"><button class="btn btn-danger">Anular</button></a>
                   </td>
               </tr>
                @endforeach
                
            </table>
        </div>
     {{$ingresos->render()}}
    </div>
</div>
@endsection
