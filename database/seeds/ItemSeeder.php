<?php

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $categories = [
            [
                'title' => 'Player',
                'type' => 1
            ],
            [
                'title' => 'Sponsor',
                'type' => 1
            ],
            [
                'title' => 'Partner',
                'type' => 1
            ],
            [
                'title' => 'Photo Gallery',
                'type' => 1
            ],
            [
                'title' => 'Video Gallery',
                'type' => 1
            ],
            [
                'title' => 'News',
                'type' => 2
            ]
        ];

        $categories = json_decode(json_encode($categories));

        foreach ($categories as $category_key => $category)
        {
            $categoryData = \App\Models\ItemCategory::create([
                'title' => $category->title,
                'type' => $category->type
            ]);

//            for ($i = 1; $i <= 10; $i++)
//            {
//                \App\Models\ItemPost::create([
//                    'title' => $category->title . ' ' . $i,
//                    'body' => $faker->paragraph,
//                    'item_category_id' => $categoryData->id,
//                ]);
//            }
        }
    }
}
