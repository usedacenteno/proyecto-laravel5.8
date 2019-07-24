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
                    <h3>Listado de Categorias <a href="{{route('crear_categoria')}}"><button class="btn btn-success">Nuevo</button></a></h3>
                    @include('almacen.categoria.search')
            </div>
        </div>
    </div>
</div>
   
       
    
   

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class=" box-body table-responsive no-padding">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Opciones</th>
                </thead>
                @csrf
               @foreach ($categorias as $cat)
                <tr>
                   <td>{{$cat->id}}</td>
                   <td>{{$cat->nombre}}</td>
                   <td>{{$cat->descripcion}}</td>
                   <td>
                       <a href="{{route('editar_categoria', ['id' => $cat->id])}}"><button class="btn btn-info">Editar</button></a>
                       <a href="{{route('eliminar_categoria', ['id' => $cat->id])}}" class="eliminar-menu tooltipsC" title="Eliminar esta categoria"><button class="btn btn-danger">Eliminar</button></a>
                   </td>
                </tr>
                
                @endforeach
                
            </table>
        </div>
        {{$categorias->render()}}
      
    </div>
</div>
@endsection
