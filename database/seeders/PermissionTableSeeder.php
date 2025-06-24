<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Roles
        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleEditor = Role::create(['name' => 'editor']);
        $roleUser = Role::create(['name' => 'user']);


        // Permission List as array
        $permissions = [

            [
                'group_name' => 'dashboard',
                'permissions' => [
                    'dashboard.view',
                    'dashboard.edit',
                    'dashboard.nav',
                ]
            ],
            [
                'group_name' => 'post',
                'permissions' => [
                    'post.create',
                    'post.show',
                    'post.edit',
                    'post.delete',
                    'post.approve',
                    'post.restore',
                    'post.pDelete',
                    'post.active',
                    'post.inActive',
                    'post.viewCount',
                    'post.slug',
                    'post.id',
                    'post.category',
                    'post.createdAt',
                    'post.deletedAt',
                    'post.uniqueViews',
                    'post.totalViews',
                    'post.nav',
                ]
            ],
            [
                'group_name' => 'user',
                'permissions' => [
                    'user.id',
                    'user.email',
                    'user.vTime',
                    'user.activepost',
                    'user.inActivepost',
                    'user.role',
                    'user.edit',
                    'user.show',
                    'user.index',
                    'user.delete',
                    'user.create',
                    'user.restore',
                    'user.pDelete',
                    'user.deletedAt',
                    'user.createdAt',
                    'user.nav',
                ]
            ],
            [
                'group_name' => 'category',
                'permissions' => [
                    'category.id',
                    'category.slug',
                    'category.activepost',
                    'category.InActivepost',
                    'category.createdAt',
                    'category.edit',
                    'category.show',
                    'category.delete',
                    'category.create',
                    'category.restore',
                    'category.pDelete',
                    'category.nav',
                ]
            ],
            [
                'group_name' => 'role',
                'permissions' => [
                    'role.id',
                    'role.name',
                    'role.createdAt',
                    'role.edit',
                    'role.show',
                    'role.delete',
                    'role.create',
                    'role.nav',
                ]
            ],
            [
                'group_name' => 'trash',
                'permissions' => [
                    'trash.show',
                    'trash.nav',
                ]
            ],
            [
                'group_name' => 'email',
                'permissions' => [
                    'email.create',
                    'email.show',
                    'email.edit',
                    'email.delete',
                    'email.approve',
                    'email.restore',
                    'email.pDelete',
                    'email.nav',
                    'email.deleteAll',
                ]
            ],
            [
                'group_name' => 'mostview',
                'permissions' => [
                    'mostView.show',
                    'mostView.nav',
                ]
            ],
        ];

        //  User Creattion 
        $user = User::create([
            'name' => 'Arif Babu', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'email_verified_at' =>  Carbon::now()
        ]);

            // Create and Assign Permissions
            for ($i = 0; $i < count($permissions); $i++) {
                $permissionGroup = $permissions[$i]['group_name'];
                for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                    // Create Permission
                    $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
                    $roleSuperAdmin->givePermissionTo($permission);
                    $user->assignRole([$roleSuperAdmin->id]);
                    // $permission->assignRole($roleSuperAdmin);
                }
            }




    }
}
