<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\sisventas\Persona;
use App\Http\Requests\ValidacionPersona;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request){
            $query=trim($request->get('searchText'));//necesito investigar como crear un searchText
            $personas = DB::table('persona')
            ->where('nombre','LIKE','%' .$query.'%')
            ->where('tipo_persona','=','Proveedor')//verificar si funciona en "C" en mayuscula
            ->orwhere('num_documento','LIKE','%' .$query.'%')
            ->where('tipo_persona','=','Proveedor')//aqui tambien verificar
            ->orderBy('id','desc')
            ->paginate(7);
            return view('compras.proveedor.index', compact('personas','query'));
           
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
        return view('compras.proveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionPersona $request)
    {
       // Menu::create($request->all());
       // return redirect('admin/menu/crear')->with('mensaje', 'Menú creado con exito');
        $persona=new Persona();
        $persona->tipo_persona='Proveedor';
        $persona->nombre=$request->get('nombre');
        $persona->tipo_documento=$request->get('tipo_documento');
        $persona->num_documento=$request->get('num_documento');
        $persona->direccion=$request->get('direccion');
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');
        $persona->save();
         return redirect('admin/compras/proveedor')->with('mensaje', 'Proveedor creada con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("compras.proveedor.show",["persona"=>Persona::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data = Persona::findOrFail($id);
        return view('compras.proveedor.edit', compact('data'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionPersona $request, $id)
    {
        $persona=Persona::findOrFail($id);
        $persona->nombre=$request->get('nombre');
        $persona->tipo_documento=$request->get('tipo_documento');
        $persona->num_documento=$request->get('num_documento');
        $persona->direccion=$request->get('direccion');
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');
        $persona->update();
       //Categaria::findOrFail($id)->update($request->all('nombre','descripcion'));
        return Redirect('admin/compras/proveedor')->with('mensaje', 'Proveedor actualizada con exito');
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
      $persona=Persona::findOrFail($id);
      $persona->tipo_persona='Inactivo';
      $persona->update();
       return redirect('admin/compras/proveedor')->with('mensaje', 'actualizado con exito');
    }
}
