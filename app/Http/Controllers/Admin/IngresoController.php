<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ValidacionIngreso;
use App\sisventas\Ingreso;
use Illuminate\Support\Carbon;
use App\sisventas\DetalleIngreso;
use App\sisventas\Persona;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;

class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request)
        {
         $query=trim($request->get('searchText'));
         
        $ingresos = DB::table('ingreso')
        
            ->join('persona', 'ingreso.proveedor_id', '=', 'persona.id')
            ->join('detalleingreso', 'ingreso.id', '=', 'detalleingreso.ingreso_id')
            ->select('ingreso.*', 'persona.nombre',DB::raw('sum(detalleingreso.cantidad*precio_compra) as total'))
            
            ->groupBy('ingreso.id','persona.nombre','ingreso.tipo_comprobante','ingreso.serie_comprobante','ingreso.num_comprobante','ingreso.impuesto','ingreso.estado')
            ->orderBy('ingreso.id','desc')
            
            ->paginate(7);
            
            

        return view('compras.ingreso.index', ['ingresos' => $ingresos,'searchText'=>$query]);
        }

      // if ($request)
      // {
       // $query=trim($request->get('searchText'));
       /* $ingresos =DB::table('ingreso')
        ->join('persona','ingreso.proveedor_id','=','persona.id')
        ->join('detalleingreso','ingreso.id','=','detalleingreso.ingreso_id')
        ->select('ingreso.*','persona.nombre'/*,DB::raw('sum(detelleingreso.cantidad*precio_compra) as total')*//*)
      /*  ->get();*/
      //  ->where('ingreso.num_comprobante','LIKE','%'.$query.'%')
//->orderBy('ingreso.id','desc')
       // ->groupBy('ingreso.id','ingreso.fecha_hora','persona.nombre','ingreso.tipo_comprobante','ingreso.serie_comprobante','ingreso.num_comprobante','ingreso.impuesto','ingreso.estado')
       // ->paginate(7);
    
       /* return view('compras.ingreso.index', compact('ingresos','query'));*/

      // }
          
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personas=DB::table('persona')->where('tipo_persona','=','Proveedor')->get();
        $articulos=DB::table('articulo as art')
        ->select(DB::raw('CONCAT(art.codigo, " ",art.nombre) AS articulo'),'art.id')
        ->where('art.estado', '=', 'Activo')
        ->get();
        return view("compras.ingreso.create",["personas"=>$personas,"articulos"=>$articulos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request 
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionIngreso $request)
    { 
        $data=array(
            'proveedor_id' =>$request->get('proveedor_id'),
            'tipo_comprobante' =>$request->get('tipo_comprobante'),
            'serie_comprobante'=>$request->get('serie_comprobante'),
            'num_comprobante'=>$request->get('num_comprobante'),
           
           'impuesto'=>$request->impuesto='15',
           'estado'=>$request->estado='A'
        );
       
        
        $lastid=Ingreso::create($data)->id;
        if(count($request->articulo_id)>=0)
        {
            foreach($request->articulo_id as $item=>$v){
                $data2=array(
                    'ingreso_id'=>$lastid,
                    'articulo_id'=>$request->articulo_id[$item],
                    'cantidad'=>$request->cantidad[$item],
                    'precio_compra'=>$request->precio_compra[$item],
                    'precio_venta'=>$request->precio_venta[$item]
                    
                );
                DetalleIngreso::insert($data2);
                
            }
           
    
        }
        return redirect()->back()->with('mensaje', 'datos ingresados con exito');
     /* try{
          DB::beginTransaction();
          $ingreso=new Ingreso;
          $ingreso->proveedor_id=$request->get('proveedor_id');
          $ingreso->tipo_comprobante=$request->get('tipo_comprobante');
          $ingreso->serie_comprobante=$request->get('serie_comprobante');
          $ingreso->num_comprobante=$request->get('num_comprobante');
          $mytime= Carbon::now('America/Managua');
          $ingreso->fecha_hora=$mytime->toDateTimeString();
          $ingreso->impuesto='15';
          $ingreso->estado='A';// A de acticvo
          $ingreso->save();

          $articulo_id= $request->get('articulo_id');
          $cantidad= $request->get('cantidad');
          $precio_compra= $request->get('precio_compra');
          $precio_venta= $request->get('precio_venta');

          $cont = 0;

          while($cont < count($articulo_id)){
              $detalle=new DetalleIngreso();
              $detalle->ingreso_id= $ingreso->id;
              $detalle->articulo_id= $articulo_id[$cont];
              $detalle->cantidad= $cantidad[$cont];
              $detalle->precio_compra= $precio_compra[$cont];
              $detalle->precio_venta= $precio_venta[$cont];
              $detalle->save();
              $cont=$cont+1;
          }
          DB::commit();
      }catch(\Exception $e)
      {
         DB::rollBack();
      }
       return redirect('admin/compras/ingresos')->with('mensaje', 'Guardado con exito');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ingreso=DB::table('ingreso as i')
        ->join('persona as p','i.proveedor_id','=','p.id')
        ->join('detalleingreso as di','i.id','=','di.ingreso_id')
        ->select('i.id','p.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado',DB::raw('sum(di.cantidad*precio_compra) as total'))
        ->groupBy('i.id','p.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado')
        ->where('i.id','=',$id)
        ->first();

        $detalles=DB::table('detalleingreso as d')
        ->join('articulo as a','d.articulo_id','=','a.id')
        ->select('a.nombre as articulo','d.cantidad','d.precio_compra','d.precio_venta')
        ->where('d.ingreso_id','=',$id)->get();
        return view("compras.ingreso.show",["ingreso"=>$ingreso,"detalles"=>$detalles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ingreso=Ingreso::findOrFail($id);
        $ingreso->Estado='C';
        $ingreso->update();
        return redirect('admin/compras/ingreso');
    }
}
