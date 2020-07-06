<?php

use Illuminate\Database\Seeder;
use App\Userp;
class UserpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Userp::class,6)->create();

    }
}
