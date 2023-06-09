<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        \App\Models\Persona::factory(50)->create();
        \App\Models\Persona::factory(1)->create(
            [ "id" => 50000]
        );
        \App\Models\Persona::factory(1)->create(
            [ "id" => 50001]
        );

        \App\Models\Persona::factory(1)->create(
            [ "id" => 50002]
        );

    }
}
