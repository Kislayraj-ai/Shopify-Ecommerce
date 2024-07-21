<?php

namespace Database\Seeders;

use App\Models\CphUserModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CphUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    //   $json = file_get_contents(database_path('')) ;
         $json = Storage::get('json/cphUser.json');
         $data = json_decode($json, true);
         
         foreach ($data as $user) {
               CphUserModel::create([
                'fname' => $user['fname'],
                'lname' => $user['lname'],
                'username' => $user['username'],
                'password' => md5($user['password']),
                'type' => $user['type'],
            ]);
        }
    }
}