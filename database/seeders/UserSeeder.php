<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Role;
use Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin =  Role::create([
            'name' => 'admin',
            'display_name' => 'User Administrator'
        ]);

        $pengguna = Role::create([
            'name' => 'pengguna',
            'display_name' => 'User'
        ]);

        $admin = new User();
        $admin->name = 'admin pkl';
        $admin->email = 'admin@gmail.com';
        $admin->password = Hash::make('12345678');
        $admin->save();
        $admin->attachRole($admin);

        $member = new User();
        $member->name = 'member';
        $member->email = 'member@gmail.com';
        $member->password = Hash::make('12345678');
        $member->save();
        $admin->attachRole($member);
    }
}
