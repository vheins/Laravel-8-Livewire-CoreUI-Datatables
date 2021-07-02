<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Menu;
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
        $perms = ['access','user','permission','role','menu','developer'];
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
        $data = [
            [
              "id" => 1,
              "sec_no" => 1,
              "text" => "Dashboard",
              "url" => "dashboard",
              "icon" => "th",
              "fa_family" => "fas",
            ],
            [
              "id" => 2,
              "sec_no" => 1,
              "text" => "System Administrator",
              "is_section" => 1,
            ],
            [
              "id" => 3,
              "sec_no" => 1,
              "text" => "Access",
              "icon" => "users",
              "fa_family" => "fas",
              "can" => "access-index",
            ],
            [
              "id" => 4,
              "sec_no" => 1,
              "text" => "Users",
              "route" => "backoff.user",
              "icon" => "user-edit",
              "fa_family" => "fas",
              "is_route" => 1,
              "can" => "user-index",
              "parent_id" => 3,
            ],
            [
              "id" => 5,
              "sec_no" => 1,
              "text" => "Roles",
              "route" => "backoff.role",
              "icon" => "user-shield",
              "fa_family" => "fas",
              "is_route" => 1,
              "can" => "role-index",
              "parent_id" => 3,
            ],
            [
              "id" => 6,
              "sec_no" => 1,
              "text" => "Permissions",
              "route" => "backoff.permission",
              "icon" => "user-lock",
              "fa_family" => "fas",
              "is_route" => 1,
              "can" => "permission-index",
              "parent_id" => 3,
            ],
            [
              "id" => 7,
              "sec_no" => 1,
              "text" => "System Developer",
              "can" => "developer-index",
            ],
            [
              "id" => 8,
              "sec_no" => 1,
              "text" => "Menu Builder",
              "route" => "dev.menu",
              "icon" => "th",
              "fa_family" => "fas",
              "is_route" => 1,
              "can" => "menu-index",
            ]
            ];
        foreach($data as $row){
            Menu::create($row);
        }

    }
}
