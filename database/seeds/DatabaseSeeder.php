<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //este es el archivo principal de los seed, desde aca decidimos a cual archvio llamar para ejecutar los seed
        $this->call(UserTableSeeder::class);
    }
}
