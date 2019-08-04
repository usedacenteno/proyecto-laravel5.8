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
                    <h3>Listado De Proveedores <a href="{{route('crear_proveedor')}}"><button class="btn btn-success">Nuevo</button></a></h3>
                    @include('compras.proveedor.search')
            </div>
        </div>
    </div>
</div>
   
       
    
   

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class=" box-body table-responsive no-padding">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Tipo Doc.</th>
                    <th>Número Doc.</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Opciones</th>
                </thead>
                @csrf
               @foreach ($personas as $per)
                <tr>
                   <td>{{$per->id}}</td>
                   <td>{{$per->nombre}}</td>
                   <td>{{$per->tipo_documento}}</td>
                   <td>{{$per->num_documento}}</td>
                   <td>{{$per->telefono}}</td>
                   <td>{{$per->email}}</td>
                    <td>
                       <a href="{{route('editar_proveedor', ['id' => $per->id])}}"><button class="btn btn-info">Editar</button></a>
                       <a href="{{route('eliminar_proveedor', ['id' => $per->id])}}" class="eliminar-menu tooltipsC" title="Eliminar esta categoria"><button class="btn btn-danger">Eliminar</button></a>
                   </td>
                </tr>
                
                @endforeach
                
            </table>
        </div>
        {{$personas->render()}}
      
    </div>
</div>
@endsection
