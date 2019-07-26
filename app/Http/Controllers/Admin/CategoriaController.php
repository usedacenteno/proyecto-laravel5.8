<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ValidacionCategoria;
use App\sisventas\Categaria;
use Illuminate\Support\Facades\Redirect;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request){
            $query=trim($request->get('searchText'));
            $categorias = DB::table('categoria')
            ->where('nombre','LIKE','%' .$query.'%')
            ->where('estado','=','1')
            ->orderBy('id','desc')
            ->paginate(7);
            return view('almacen.categoria.index', compact('categorias','query'));
           
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //si da problemas puedes intentar cambiar las comillas simples por dobles
        return view('almacen.categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionCategoria $request)
    {
        
        $categoria=new Categaria();
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->estado='1';
        $categoria->save();
         return redirect('admin/categoria/crear')->with('mensaje', 'Categoria creada con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("almacen.categoria.show",["categoria"=>Categaria::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data = Categaria::findOrFail($id);
        return view('almacen.categoria.edit', compact('data'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionCategoria $request, $id)
    {
        $categoria=Categaria::findOrFail($id);
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->update();
       //Categaria::findOrFail($id)->update($request->all('nombre','descripcion'));
        return Redirect('admin/almacen/categoria')->with('mensaje', 'Categoria actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Categaria::destroy($id);
        //return redirect('admin/almacen/categoria')->with('mensaje', 'Categoria eliminado con exito');
      $categoria=Categaria::findOrFail($id);
      $categoria->estado='0';
      $categoria->update();
       return redirect('admin/almacen/categoria')->with('mensaje', 'Categoria desabilidata con exito');
    }
    public function guardarOrden(Request $request)
    {
        if ($request->ajax()) {
            $categoria = new Categaria();
            $categoria->guardarOrden($request->categoria);
            return response()->json(['respuesta' => 'ok']);
        } else {
            abort(404);
        }
    }
}
