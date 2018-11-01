<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\User::create([
            'name'=>'carolina',
            'email'=>'carolv@ua.pt',
            'password'=>bcrypt('fdsfgsdfgsdfgsdfgsd')
        ]);

        \App\User::create([
            'name'=>'gabriel',
            'email'=>'grabiel@ua.pt',
            'password'=>bcrypt('esdfgsdfgsdgsdfg')
        ]);

        \App\User::create([
            'name'=>'ruben',
            'email'=>'ruben@ua.pt',
            'password'=>bcrypt('sdhfhsdfgsdfgsdf')
        ]);

        \App\User::create([
            'name'=>'graciana',
            'email'=>'graciana@ua.pt',
            'password'=>bcrypt('sdfgsdflhsdkjsdf')
        ]);
    }
}
