<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\sisventas\Ingreso;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ValidacionIngreso extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'proveedor_id'=>'required',
            'tipo_comprobante'=>'required|max:20',
            'serie_comprobante'=>'max:7',
            'num_comprobante'=>'required|max:10',
            'articulo_id'=>'required',
            'cantidad'=>'',
            'precio_compra'=>'',
            'precio_venta'=>''
        ];
    }
  /*  public function createIngreso(){

        DB::transaction(function () {
            $request = $this->validated();
            

            $ingreso =new Ingreso(array(
                'proveedor_id' => $request('proveedor_id'),
                'tipo_comprobante' => $request('tipo_comprobante'),
                'serie_comprobante' => $request('serie_comprobante'),
                'num_comprobante' => $request('num_comprobante'),
               
                
                'impuesto' => ('15'),
                'estado' => ('A')
            ));
           
            $ingreso->Detalleingresos()->create(array(
              'ingreso_id'=> $ingreso('id'),
              'articulo_id'=> $ingreso('articulo_id'),
              'cantidad'=> $ingreso('cantidad'),
              'precio_compra'=> $ingreso('precio_compra'),
              'precio_venta'=> $ingreso('precio_venta'),
              
            ));
            $ingreso->save();
            
            
        });
    }*/
}
