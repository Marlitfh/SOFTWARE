<?php

use App\User;
use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'special' => 'all-access',
        ]);

        $user = User::create([
            'name' => 'administrador23',
            'email' => 'administrador23@gmail.com',
            'password' => '$2y$10$pYuUVwP.JMUtuSJGfk9FkeumRi5gB81.g4foHekwg8QioomJBiCWO',
        ]);

        $user->roles()->sync(1);
    }
}
