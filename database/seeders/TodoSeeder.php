<?php

namespace Database\Seeders;

use App\Models\Todo;
use App\Models\TodoTask;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Todo::factory(10)->create()->each(function($todo) {
            $todo->tasks()->saveMany(
                TodoTask::factory(10)->make()
            );
        });
    }
}