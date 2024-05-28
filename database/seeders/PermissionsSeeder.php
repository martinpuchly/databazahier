<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    #PERMISSION
        Permission::insert(['main_name' => 'Stránka', 'name' => 'Povolenia', 'key' => 'permissions', 'route' => 'admin.permissions', 'link_in_admin_menu' => 1]);

    #GROUPS
        Permission::insert(['main_name' => 'Stránka', 'name' => 'Skupiny', 'key' => 'groups', 'route' => 'admin.groups', 'link_in_admin_menu' => 1]);
        Permission::insert(['main_name' => 'Stránka', 'name' => 'pridať skupinu', 'key' => 'group-add', 'route' => 'admin.group.add', 'link_in_admin_menu' => 0]);
        Permission::insert(['main_name' => 'Stránka', 'name' => 'upraviť skupinu', 'key' => 'group-edit', 'route' => 'admin.group.edit', 'link_in_admin_menu' => 0]);
        Permission::insert(['main_name' => 'Stránka', 'name' => 'vymazať skupinu', 'key' => 'group-delete', 'route' => 'admin.group.edit', 'link_in_admin_menu' => 0]);
    #GROUPS - PERMISSION
        Permission::insert(['main_name' => 'Stránka', 'name' => 'povolenia skupiny', 'key' => 'group-permissions', 'route' => 'admin.permissions.group', 'link_in_admin_menu' => 0]);

    #USERS
        Permission::insert(['main_name' => 'Používateľia', 'name' => 'UŽÍVATEĽIA', 'key' => 'admin-users', 'route' => 'admin.users', 'link_in_admin_menu' => 1]);
        Permission::insert(['main_name' => 'Používateľia', 'name' => 'vymazať užívateľa', 'key' => 'admin-user-delete', 'route' => 'admin.user.delete', 'link_in_admin_menu' => 0]);

    #USERS - PERMISSION
        Permission::insert(['main_name' => 'Používateľia', 'name' => 'povolenia užívateľa', 'key' => 'user-permissions', 'route' => 'admin.permissions.user', 'link_in_admin_menu' => 0]);

    #USERS - GROUPS
        Permission::insert(['main_name' => 'Používateľia', 'name' => 'skupiny užívateľa', 'key' => 'user-groups', 'route' => 'admin.groups.user', 'link_in_admin_menu' => 0]);

    

   
   
    }

}



