<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Admin::class, 1)->create();
        factory(\App\Client::class, 10)->create()->each(function ($client) {
            $client->clientDetails()->save(factory(\App\ClientDetails::class)->make());
        });
    }
}
