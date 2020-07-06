<?php

use Illuminate\Database\Seeder;

class FicheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(\App\Fiche::class,6)->create();
    }
}
