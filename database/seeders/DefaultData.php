<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FrontUser;
use App\Models\Admin;

class DefaultData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data['name'] = 'Admin';
        $data['password'] = bcrypt(123456);
        $data['email'] = 'admin@gmail.com';

        Admin::create($data);

        $data['name'] = 'User';
        $data['password'] = bcrypt(123456);
        $data['email'] = 'user@gmail.com';
        
        FrontUser::create($data);
    }
}
