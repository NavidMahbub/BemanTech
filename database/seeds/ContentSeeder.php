<?php

use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
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
                'title' => 'পিকেসিএসবিডি কী?',
                'has_child' => 0,
                'dropdown' => []
            ],
            [
                'title' => 'ট্যালেন্ট হান্ট কি?',
                'has_child' => 0,
                'dropdown' => []
            ],
            [
                'title' => 'কেন এই ট্যালেন্ট হান্ট?',
                'has_child' => 0,
                'dropdown' => []
            ],
            [
                'title' => 'ট্যালেন্ট হান্ট পদ্ধতি',
                'has_child' => 0,
                'dropdown' => []
            ],
            [
                'title' => 'কাঠামো',
                'has_child' => 0,
                'dropdown' => []
            ],
            [
                'title' => 'সময়সূচি',
                'has_child' => 0,
                'dropdown' => []
            ],
            [
                'title' => 'নিবন্ধন প্রক্রিয়া',
                'has_child' => 0,
                'dropdown' => []
            ],
            [
                'title' => 'দর্শক অংশগ্রহণ',
                'has_child' => 0,
                'dropdown' => []
            ],
            [
                'title' => 'অন্যান্য',
                'has_child' => 1,
                'dropdown' => [
                    [
                        'title' => 'Terms and Conditions'
                    ],
                    [
                        'title' => 'Refund and Return Policy'
                    ],
                    [
                        'title' => 'Privacy Policy'
                    ]
                ]
            ]
        ];

        $categories = json_decode(json_encode($categories));

        foreach ($categories as $category_key => $category)
        {
            if ($category->has_child)
            {
                $categoryData = \App\Models\ContentCategory::create([
                    'title' => str_replace('?', '', $category->title),
                    'body' => $faker->paragraph,
                    'has_child' => $category->has_child,
                    'order' => $category_key + 1,
                ]);

                $contents = $category->dropdown;

                foreach ($contents as $content_key => $content)
                {
                    \App\Models\ContentPost::create([
                        'title' => $content->title,
                        'body' => 'This page is under construction',
                        'order' => $content_key + 1,
                        'content_category_id' => $categoryData->id,
                    ]);
                }
            }
            else
            {
                \App\Models\ContentCategory::create([
                    'title' => $category->title,
                    'body' => 'This page is under construction',
                    'has_child' => $category->has_child,
                    'order' => $category_key + 1,
                ]);
            }
        }
    }
}
