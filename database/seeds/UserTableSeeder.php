<?php

use Illuminate\Database\Seeder;
use WilliGant\User\Service\Service;
use WilliGant\User\User;

/**
 * Class UserTableSeeder
 */
class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->truncate();
        DB::table('user_services')->truncate();
        DB::table('life_snapshots')->truncate();

        $user = User::create(['email' => 'emailaddress@example.com','name'=>'Will Washburn']);

        Service::create(['user_id'=>$user->id,'type'=>Service::TYPE_LASTFM,'identifier'=>'willwashburn']);
    }

}
