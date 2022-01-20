<?php

namespace Database\Seeders;


use Database\Seeders\core\CoreOptionSeeder;

use Illuminate\Database\Seeder;

class CoreSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([

            CoreOptionSeeder::class
        ]);
    }
}
