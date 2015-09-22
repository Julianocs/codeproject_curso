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
        \CodeProject\Clientes::truncate();
        factory(\CodeProject\Clientes::class, 10)->create();
    }
}
