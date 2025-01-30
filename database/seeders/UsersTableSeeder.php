<?php
namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'miguelgiraldo1116@gmail.com', // Mail Admin
            'password' => Hash::make('admin123'), // Contraseña Admin
            'is_admin' => true, // Establece el campo is_admin en true
        ]);
    }
}
