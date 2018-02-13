<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {

        User::create(
            array(
                'nom' => 'Charmat',
                'prenom' => 'Abderaouf',
                'email' =>  'a.charmat@esi-sba.dz',
                'password' => bcrypt('123456'),
            )
        );

    }
}
