<?php

use Illuminate\Database\Seeder;

class ClienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \CodeProject\Entities\Clientes::truncate();
        factory(\CodeProject\Entities\Clientes::class, 10)->create();
    }
}
