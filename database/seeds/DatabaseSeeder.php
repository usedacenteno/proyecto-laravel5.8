<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTablas([
            'rol',
            'permiso'
        ]);
         // $this->call(UsersTableSeeder::class);
        $this->call(tablerolseeder::class);
        $this->call(TablaPermisoSeeder::class);
    }
       
        

        protected function truncateTablas(array $tablas)
        {
          DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
          foreach ($tablas as $tabla){
              DB::table($tabla)->truncate();
          }
          DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        }
    }

