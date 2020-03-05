<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name' => 'manage-users',
                'display_name' => 'Manage User',
                'description' => 'Manage User..',
            ],
            [
                'name' => 'create-user',
                'display_name' => 'Create User',
                'description' => 'Create User..',
            ],
            [
                'name' => 'read-user',
                'display_name' => 'Read User',
                'description' => 'Read User..',
            ],
            [
                'name' => 'update-user',
                'display_name' => 'Update User',
                'description' => 'Update User..',
            ]
        ];

        foreach ($permissions as $key => $permission){
            Permission::create($permission);
        }
    }
}
