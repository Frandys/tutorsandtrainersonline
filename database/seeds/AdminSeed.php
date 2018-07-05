<?php

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Database\Seeder;
use Cartalyst\Sentinel\Users\UserInterface;
use App\User;
use Illuminate\Support\Facades\Session;
use Cartalyst\Sentinel\Activations\EloquentActivation;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Illuminate\Support\Facades\DB;
class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(array(
            'slug' => 'admin',
            'name' => 'admin',
        ));

        $credential = [
            'email' => $data['email'],
            'password' => $password,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $phone,
        ];
        $user_act = Sentinel::registerAndActivate($credential);
        $role =  Sentinel::findRoleByName('admin');
        $role->users()->attach($user_act);
    }
}
