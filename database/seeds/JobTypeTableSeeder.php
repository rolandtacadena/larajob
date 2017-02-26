<?php

use Illuminate\Database\Seeder;

class JobTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $job_types = [
            ['name' => 'Fulltime'],
            ['name' => 'Parttime'],
            ['name' => 'Freelance']
        ];

        \App\Type::insert($job_types);
    }
}
