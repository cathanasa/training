<?php

use Illuminate\Database\Seeder;
use Illiminate\Support\Facades\DB;
use App\Project;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('customers')->insert([
            'fullname' => str_random(20)
        ]);
    }
}
