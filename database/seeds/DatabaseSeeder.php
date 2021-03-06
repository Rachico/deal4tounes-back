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
        //$this->call(RoleSeeder::class);
        //$this->call(PermissionSeeder::class);
        //$this->call(ContactSeeder::class);
        //$this->call(UserSeeder::class);
        $this->call(OfferSeeder::class);
        //$this->call(ActionSeeder::class);
        $this->call(ArticleSeeder::class);
    }
}
