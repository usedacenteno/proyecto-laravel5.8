<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\sisventas\Articulo;
use App\Http\Requests\ValidacionArticulo;
use Illuminate\Support\Facades\Input;

class ArticuloController extends Controller
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
            $articulos = DB::table('articulo as a')
            ->join('categoria as c','a.categoria_id','c.id')
            ->select('a.id','a.nombre','a.codigo','a.stock','c.nombre as categoria','a.descripcion','a.imagen','a.estado')
            ->where('a.nombre','LIKE','%' .$query.'%')
            ->orwhere('a.codigo','LIKE','%' .$query.'%')
            ->orderBy('a.id','desc')
            ->paginate(7);
            return view('almacen.articulo.index', compact('articulos','query'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=DB::table('categoria')->where('estado','=','1')->get();
        return view('almacen.articulo.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionArticulo $request)
    {
       // Menu::create($request->all());
        $articulo=new Articulo();
        $articulo->categoria_id=$request->get('categoria_id');
        $articulo->codigo=$request->get('codigo');
        $articulo->nombre=$request->get('nombre');
        $articulo->stock=$request->get('stock');
        $articulo->descripcion=$request->get('descripcion');
        $articulo->estado='Activo';
        if (Input::hasFile('imagen')){
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
            $articulo->imagen=$file->getClientOriginalName();
        }
        $articulo->save();
         return redirect('admin/articulo/crear')->with('mensaje', 'Categoria creada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("almacen.articulo.show",["articulo"=>Articulo::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Articulo::findOrFail($id);
        $categorias=DB::table('categoria')->where('estado','=','1')->get();
        return view('almacen.articulo.edit', compact('data','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionArticulo $request, $id)
    {
        $articulo=Articulo::findOrFail($id);
        $articulo->categoria_id=$request->get('categoria_id');
        $articulo->codigo=$request->get('codigo');
        $articulo->nombre=$request->get('nombre');
        $articulo->stock=$request->get('stock');
        $articulo->descripcion=$request->get('descripcion');
        
        if (Input::hasFile('imagen')){
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
            $articulo->imagen=$file->getClientOriginalName();
        }
        $articulo->update();
       //Categaria::findOrFail($id)->update($request->all('nombre','descripcion'));
        return Redirect('admin/almacen/articulo')->with('mensaje', 'Categoria actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // Categaria::destroy($id);
        //eturn redirect('admin/almacen/categoria')->with('mensaje', 'Categoria eliminado con exito');
        $articulo=Articulo::findOrFail($id);
        $articulo->estado='Inactivo';
        $articulo->update();
        return redirect('admin/almacen/articulo')->with('mensaje', 'Articulo inhabilitado con exito');
    }
}
