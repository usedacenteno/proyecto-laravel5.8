<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
</head>
<body>
<div class="container">
  <br/>
  @if($errors->any())
<div class="alert alert-danger">

  <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
        
    @endforeach
  </ul>
</div>
  @endif  

  @if(session('mensaje'))
     <div class="alert alert-success">
         <p>{{ session('mensaje') }}</p>
     </div>
  @endif  

    <form action="{{url('frutas/agregar')}}" method="post">
      @csrf
      <div class="form-group">
        <label for="nombre" >Fruta</label>
        <input type="text" class="form-control" name="nombre" value="{{ old('nombre')}}">    
      </div> 
      <div class="form-group">
            <label for="precio" >precio</label>
            <input type="text" class="form-control" name="precio" value="{{ old('precio')}}">    
     </div> 
          <button type="submit" class="btn btn-primary">guardar</button>   
    </form>    
</div>   
</body>
</html>