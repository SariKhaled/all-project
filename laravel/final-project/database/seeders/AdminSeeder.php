<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            "name"=>"sari",
            "email"=>"sari@sari.com",
            "password"=>Hash::make("123123"),
            "image"=>"admins/1673450689_image_Gregory Burke.png",
            "moblie"=>"123123123123"
        ]);

    }
}
