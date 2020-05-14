<?php

use Illuminate\Database\Seeder;

use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Permission::create([

        	'name' => 'Navegar agremiado',
        	'slug' => 'users.index',
        	'description' => 'no importa',
        	]);

         Permission::create([

        	'name' => 'Ver detalle usuarios',
        	'slug' => 'users.show',
        	'description' => 'no importa',        	
        	]);

          Permission::create([

        	'name' => 'Edicion de agremiado',
        	'slug' => 'users.edit',
        	'description' => 'no importa',
        	
        	]);

           Permission::create([

        	'name' => 'Navegar institucion',
        	'slug' => 'users.destroy',
        	'description' => 'no importa',
        	
        	]);

           //-----------roles-------------

           Permission::create([

        	'name' => 'Navegar roles',
        	'slug' => 'roles.index',
        	'description' => 'no importa',

        	]);

         Permission::create([

        	'name' => 'Ver detalle roles',
        	'slug' => 'roles.show',
        	'description' => 'no importa',
        	
        	]);

          Permission::create([

        	'name' => 'Edicion de roles',
        	'slug' => 'roles.edit',
        	'description' => 'no importa',
        	
        	]);

           Permission::create([

        	'name' => 'Navegar roles',
        	'slug' => 'roles.create',
        	'description' => 'no importa',
        	
        	]);

            //-----------agremiado-------------

           Permission::create([

        	'name' => 'Navegar agremiado',
        	'slug' => 'agremiado.index',
        	'description' => 'no importa',

        	]);

         Permission::create([

        	'name' => 'Ver detalle agremiado',
        	'slug' => 'agremiado.show',
        	'description' => 'no importa',
        	
        	]);

          Permission::create([

        	'name' => 'Edicion de agremiado',
        	'slug' => 'agremiado.edit',
        	'description' => 'no importa',
        	
        	]);

           Permission::create([

        	'name' => 'Navegar agremiado',
        	'slug' => 'agremiado.create',
        	'description' => 'no importa',
        	
        	]);
    }
}
