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
            'password' => bcrypt('admin719'),
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
            'name' => 'kepala devisi marketing',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'kepala devisi administrasi',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'kepala devisi 3',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'kepala devisi 4',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'kepala devisi 5',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'kepala devisi 6',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'kepala devisi 7',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'kepala devisi 8',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'karyawan',
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
        DB::table('model_has_roles')->insert([
            ['role_id' => 5,
             'model_type' => 'App\Models\User',
             'model_id' => 5
            ]
        ]);
        DB::table('model_has_roles')->insert([
            ['role_id' => 6,
             'model_type' => 'App\Models\User',
             'model_id' => 6
            ]
        ]);
        DB::table('model_has_roles')->insert([
            ['role_id' => 7,
             'model_type' => 'App\Models\User',
             'model_id' => 7
            ]
        ]);
        DB::table('model_has_roles')->insert([
            ['role_id' => 8,
             'model_type' => 'App\Models\User',
             'model_id' => 8
            ]
        ]);
        DB::table('model_has_roles')->insert([
            ['role_id' => 9,
             'model_type' => 'App\Models\User',
             'model_id' => 9
            ]
        ]);
        DB::table('model_has_roles')->insert([
            ['role_id' => 10,
             'model_type' => 'App\Models\User',
             'model_id' => 10
            ]
        ]);
        DB::table('model_has_roles')->insert([
            ['role_id' => 11,
             'model_type' => 'App\Models\User',
             'model_id' => 11
            ]
        ]);
    }
}
