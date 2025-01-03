<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FAQ;


class FaqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FAQ::create(['question' => 'What is Laravel?', 'answer' => 'Laravel is a PHP framework.', 'category_id' => 1]);
        FAQ::create(['question' => 'How to use Laravel?', 'answer' => 'By using Artisan commands and routes.', 'category_id' => 2]);
    }
}
