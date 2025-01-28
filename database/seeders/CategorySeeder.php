<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //can user: save(), create(), createMany(), Insert()

        $categories = [
            [
                'name' => 'Current Events',
                'updated_at' => NOW(),
                'created_at' => NOW()
            ],
            [
                'name' => 'Beauty',
                'updated_at' => NOW(),
                'created_at' =>NOW()
            ],
            [
                'name' => 'Wellness',
                'updated_at' => NOW(),
                'created_at' => NOW()
            ]
        ];

        Category::insert($categories);
        // ==$this->categoru->insert($categories)
    }
}
