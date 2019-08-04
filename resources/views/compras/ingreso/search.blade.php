
<!--<div class="form-group">
    <div class="input-group">
        <input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="">
        <span class="input-group-btn">
            <button type="submit" class="btn btn-primary">Buscar</button>
        <span>
    </div>
</div>-->


 <!-- search form -->
 <form action="{{route('vista_ingreso')}}" method="get" class="sidebar-form" autocomplete='off',role= 'search' >
     
        <div class="input-group">
          <input type="text" name="searchText" class="form-control" placeholder="Buscar..." >
              <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">Buscar</button>            
              </span>
        </div>
    
</form>
      <!-- /.search form -->