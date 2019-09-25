<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Http\Models\People;
use App\Http\Models\Users;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = People::insertGetId([
            'nome'        => env('ADMIN_NAME'),
            'type'        => env('ADMIN_TYPE'),
            'email'       => env('ADMIN_EMAIL'),
        ]);

        Users::insert([
            'username'  => env('ADMIN_USERNAME'),
            'password'  => Hash::make( env('ADMIN_PASSWORD') ),
            'people_id' => $id,
            'online'    => '0',
            'active'    => '1',
        ]);
    }
}
