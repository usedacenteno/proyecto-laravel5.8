<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class tablerolseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rols =[
            'adminstrador',
            'encargado',
             'vendedor'
        ];
        foreach($rols as $key=> $value){
            DB::table('rol')->insert([
                'nombre'=> $value,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    
                ]);
        }
    }
}
