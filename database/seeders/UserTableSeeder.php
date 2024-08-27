<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        public function run()
    {
        $arrUser = [
            [
                'name' => 'SuperAdmin',
                'email' => 'superadmin@gmail.com',
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'Shihab12',
                'email' => 'shihabuddin@gmail.com',
                'password' => Hash::make('1234567'),
            ]
        ];

        foreach ($arrUser as $eachUser) {
            $use = new User();
            $use->fill($eachUser);


            $use->save();
        }
    }

}
