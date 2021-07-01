<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);
        /**role */
        Role::create([
            'name' => 'super admin',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'HRD',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'karyawan',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'kepala devisi',
            'guard_name' => 'web'
        ]);

        /**model role */
        DB::table('model_has_roles')->insert([
            ['role_id' => 1,
             'model_type' => 'App\Models\User',
             'model_id' => 1
            ]
        ]);
        DB::table('model_has_roles')->insert([
            ['role_id' => 2,
             'model_type' => 'App\Models\User',
             'model_id' => 2
            ]
        ]);
        DB::table('model_has_roles')->insert([
            ['role_id' => 3,
             'model_type' => 'App\Models\User',
             'model_id' => 3
            ]
        ]);
        DB::table('model_has_roles')->insert([
            ['role_id' => 4,
             'model_type' => 'App\Models\User',
             'model_id' => 4
            ]
        ]);
    }
}
