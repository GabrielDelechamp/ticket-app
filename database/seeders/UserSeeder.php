<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


use Bouncer;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'client',
            'email' => 'client@client.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'dev',
            'email' => 'dev@dev.com',
            'password' => Hash::make('password'),
        ]);



        User::factory(20)->create();
        $users=User::all();
        foreach ($users as $user) {
            if ($user->id != 3) {
            $user->assign('client');
            }
        }

        $user=User::find(1);
        $user->assign('admin');

        $user=User::find(2);
        $user->assign('client');

        $user=User::find(3);
        $user->assign('dev');

        $user=User::find(7);
        $user->assign('dev');

    }
}
