<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = new User();
        $usuario->nombre = 'Iván';
        $usuario->apellido = 'Sánchez';
        $usuario->email = 'tuxsaveus@gmail.com';
        $usuario->password = '$2y$10$DqBosVhpZ8Qtyx2HWJXqq.E6g6DRfbzfCROVDwHhbOrqDp.ZJluI2';
        $usuario->save();

        $usuario = new User();
        $usuario->nombre = 'tux';
        $usuario->apellido = 'saveus';
        $usuario->email = 'yizux@gmail.com';
        $usuario->password = '$2y$10$DqBosVhpZ8Qtyx2HWJXqq.E6g6DRfbzfCROVDwHhbOrqDp.ZJluI2';
        $usuario->save();

        User::create([
            'nombre' => 'Sánchez',
            'apellido' => 'Vallejo',
            'email' => 'isv@gmail.com',
            'password' => '$2y$10$DqBosVhpZ8Qtyx2HWJXqq.E6g6DRfbzfCROVDwHhbOrqDp.ZJluI2'
        ]);

        factory(User::class, 10)->create();
    }
}
