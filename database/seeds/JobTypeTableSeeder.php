<?php

use Illuminate\Database\Seeder;
use App\Type;

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

        Type::insert($job_types);
    }
}
