<?php

use Illuminate\Database\Seeder;
use App\Userp;
use App\Fiche;
use App\Question;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(UserpSeeder::class);
        $this->call(FicheSeeder::class);
        $this->call(QuestionSeeder::class);
    }
}
