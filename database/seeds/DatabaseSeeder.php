<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //\CodeProject\Entities\Clientes::truncate();
        //\CodeProject\Entities\Project::truncate();

        $this->call(UserTableSeeder::class);
        $this->call(ClienteTableSeeder::class);
        $this->call(ProjectTableSeeder::class);
        $this->call(ProjectNoteTableSeeder::class);

        Model::reguard();
    }
}

