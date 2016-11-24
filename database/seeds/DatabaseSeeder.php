<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(UserRoleTableSeeder::class);
        $this->call(RolePermissionTableSeeder::class);
//        $this->call(TagsTableSeeder::class);
//        $this->call(JobTagTableSeeder::class);
        $this->call(CustomUsersSeeder::class);
        $this->call(ProductTableSeeder::class);
    }
}
