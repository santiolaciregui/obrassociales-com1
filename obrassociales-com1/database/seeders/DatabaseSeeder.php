<?php

namespace Database\Seeders;

use Database\Factories\ClienteFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class); 
        $this->call(UsuarioSeeder::class);
        $this->call(PlanesSeeder::class);
        $this->call(PrestacionesSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(FamiliarSeeder::class);
        //$this->call(ClienteFactory::class::factory(10)->create());
    }
}
