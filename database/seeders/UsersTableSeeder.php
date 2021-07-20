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

        /**model role */
        DB::table('model_has_roles')->insert([
            ['role_id' => 1,
             'model_type' => 'App\Models\User',
             'model_id' => 1
            ]
        ]);
    }
}
