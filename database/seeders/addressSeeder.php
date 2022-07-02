<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class addressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\address::factory(10)->create();
    }
}
