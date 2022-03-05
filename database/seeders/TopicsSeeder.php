<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Seeder;

class TopicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Topic::create(['name' => 'Laravel']);
        Topic::create(['name' => 'SEO']);
        Topic::create(['name' => 'PHP']);
        Topic::create(['name' => 'LIVEWIRE']);
    }
}
