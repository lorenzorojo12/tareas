<?php
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creamos el seeder para la creacion de un usuario por defecto
        User::create([
            'name' =>'Administrador',
            'email'=> 'admin@panel.com',
            'password' => bcrypt('admin')
        ]);
    }
}
