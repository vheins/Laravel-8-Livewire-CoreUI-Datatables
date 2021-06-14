<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Seed Permissions
        $bulks = ['index','create','view','edit','delete'];
        $perms = ['access','user','permission','role'];
        foreach($perms as $perm){
            foreach($bulks as $bulk){
                $data = ['name' => $perm.'-'.$bulk];
                Permission::firstOrCreate($data);
            }
        }

        //Seed Roles
        $bulks = ['index','create','view','edit','delete'];
        $roles = ['Developer','Super Administrator','Administrator','Staff'];
        foreach($roles as $role){
            $data = ['name' => $role];
            Role::firstOrCreate($data);
        }

        $role = Role::findByName('Developer');
        $permission = Permission::select('name')->get()->toArray();
        //dd($permission);
        $role->syncPermissions($permission);

        $user = User::create([
            'name' => 'Super Administrator',
            'email' => 'super@admin.dev',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        $user->syncRoles(['Developer','Super Administrator']);

        // \App\Models\User::factory(10)->create();
    }
}
