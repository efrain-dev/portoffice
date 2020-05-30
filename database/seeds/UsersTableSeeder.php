<?php

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
        factory(App\User::class,30)->create();
        App\User::create([
            'name'=>'Efrain de Leon',
            'email'=>'efraindeleon12@outlook.com',
            'password'=>bcrypt('30193428')


    ]);
    }
}
