<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(PermissionDatabaseSeeder::class);
    }
}
class PermissionDatabaseSeeder extends Seeder
{
    public function run()
    {
         DB::table('permissions')->insert([
            ['name' => 'dash-board', 'group' => 'admin', 'description' => 'admin dashboard'],
            ['name' => 'user-list', 'group' => 'users', 'description' => 'user list'],
            ['name' => 'user-create', 'group' => 'users', 'description' => 'user create'],
            ['name' => 'user-update', 'group' => 'users', 'description' => 'user update'],
            ['name' => 'user-dalete', 'group' => 'users', 'description' => 'user dalete'],
            ['name' => 'role-list', 'group' => 'roles', 'description' => 'role list'],
            ['name' => 'role-create', 'group' => 'roles', 'description' => 'role create'],
            ['name' => 'role-update', 'group' => 'roles', 'description' => 'role update'],
            ['name' => 'role-delete', 'group' => 'roles', 'description' => 'role delete'],
            ['name' => 'ACL-create', 'group' => 'ACL', 'description' => 'ACL create'],
            ['name' => 'product-gr-list', 'group' => 'products', 'description' => 'product group list'],
            ['name' => 'product-gr-create', 'group' => 'products', 'description' => 'product group create'],
            ['name' => 'product-gr-update', 'group' => 'products', 'description' => 'product group update'],
            ['name' => 'product-gr-delete', 'group' => 'products', 'description' => 'product group delete'],
            ['name' => 'product-type-list', 'group' => 'products', 'description' => 'product type list'],
            ['name' => 'product-type-create', 'group' => 'products', 'description' => 'product type create'],
            ['name' => 'product-type-update', 'group' => 'products', 'description' => 'product type update'],
            ['name' => 'product-type-delete', 'group' => 'products', 'description' => 'product type delete'],
            ['name' => 'product-class-list', 'group' => 'products', 'description' => 'product class list'],
            ['name' => 'product-class-create', 'group' => 'products', 'description' => 'product class create'],
            ['name' => 'product-class-update', 'group' => 'products', 'description' => 'product class update'],
            ['name' => 'product-class-delete', 'group' => 'products', 'description' => 'product class delete'],
            ['name' => 'product-list', 'group' => 'products', 'description' => 'product list'],
            ['name' => 'product-create', 'group' => 'products', 'description' => 'product create'],
            ['name' => 'product-update', 'group' => 'products', 'description' => 'product update'],
            ['name' => 'product-delete', 'group' => 'products', 'description' => 'product delete'],
        ]);
    }
}
