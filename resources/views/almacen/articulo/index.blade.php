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
                    <h3>Lista de Articulos <a href="{{route('crear_articulo')}}"><button class="btn btn-success">Nuevo</button></a></h3>
                    @include('almacen.articulo.search')
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
                    <th>Código</th>
                    <th>categorias</th>
                    <th>Stock</th>
                    <th>Imagen</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </thead>
                @csrf
               @foreach ($articulos as $art)
                <tr>
                   <td>{{$art->id}}</td>
                   <td>{{$art->nombre}}</td>
                   <td>{{$art->codigo}}</td>
                   <td>{{$art->categoria}}</td>
                   <td>{{$art->stock}}</td>
                   <td>
                       <img src="{{asset('imagenes/articulos/'.$art->imagen)}}" alt="{{$art->nombre}}" height="100px" width="100px" class="img-thumbnail">
                   </td>
                   <td>{{$art->estado}}</td>
                   <td>
                       <a href="{{route('editar_articulo', ['id' => $art->id])}}"><button class="btn btn-info">Editar</button></a>
                       <a href="{{route('eliminar_articulo', ['id' => $art->id])}}" class="eliminar-menu tooltipsC" title="Eliminar esta categoria"><button class="btn btn-danger">Eliminar</button></a>
                   </td>
                </tr>
                
                @endforeach
                
            </table>
        </div>
        {{$articulos->render()}}
      
    </div>
</div>
@endsection
