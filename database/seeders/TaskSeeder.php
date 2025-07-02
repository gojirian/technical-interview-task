<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\Comment;
use App\Models\User;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory(3)->create();
        // Ensure at least one user meets the new criteria for LargeTableSQLTest
        $specialUser = User::factory()->create();
        $task = \App\Models\Task::factory()->create([
            'user_id' => $specialUser->id,
            'is_active' => 1,
            'due_date' => '2025-07-01',
        ]);
        // Insert 2 unique titles, both active, for the same user and task
        \App\Models\LargeTable::factory()->create([
            'task_id' => $task->id,
            'user_id' => $specialUser->id,
            'title' => 'Event A',
            'is_active' => 1,
        ]);
        \App\Models\LargeTable::factory()->create([
            'task_id' => $task->id,
            'user_id' => $specialUser->id,
            'title' => 'Event B',
            'is_active' => 1,
        ]);
        // Add a third record with a different title, inactive, to show it doesn't affect the active count
        \App\Models\LargeTable::factory()->create([
            'task_id' => $task->id,
            'user_id' => $specialUser->id,
            'title' => 'Event C',
            'is_active' => 0,
        ]);
        // Add an inactive task for the same user
        \App\Models\Task::factory()->create([
            'user_id' => $specialUser->id,
            'is_active' => 0,
            'due_date' => '2025-07-05',
        ]);
        // Seed additional random tasks and large_table records for other users
        Task::factory(10)->create()->each(function ($task) use ($users) {
            \App\Models\LargeTable::factory(rand(2, 5))->create([
                'task_id' => $task->id,
                'user_id' => $users->random()->id,
            ]);
        });
    }
}
