<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        DB::table('questions')->insert([
            [
                'question' => '¿Qué estudios tienes?',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'question' => '¿Qué tipo de música te gusta?',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'question' => '¿Dónde te gustaría ir de vacaciones?',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
