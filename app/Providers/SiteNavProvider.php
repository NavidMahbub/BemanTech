<?php

namespace App\Providers;

use App\Models\ContentPost;
use App\Models\ContentCategory;
use App\Models\PortfolioCategory;
use App\Models\ProjectCategory;
use Illuminate\Support\ServiceProvider;

class SiteNavProvider extends ServiceProvider
{
    public function boot()
    {
        // manipulating site nav
        $site_nav = [
            // content routes

            [
                'title' => [
                    'en' => 'Home',
                    'bn' => 'Home',
                ],
                'id' => 'home',
                'dropdown' => [],
                'url' => url('/'),
            ],
            [
                'title' => [
                    'en' => 'Projects',
                    'bn' => 'Projects',
                ],
                'id' => 'projects',
                'dropdown' => $this->getProjectDropdown(),
                'url' => '',
            ],    
            [
                'title' => [
                    'en' => 'Technology',
                    'bn' => 'Technology',
                ],
                'id' => 'technology',
                'dropdown' => [],
                'url' =>url('technology'),
            ],
            [
                'title' => [
                    'en' => 'Clients',
                    'bn' => 'Clients',
                ],
                'id' => 'clients',
                'dropdown' => [],
                'url' =>url('client'),
            ],
            [
                'title' => [
                    'en' => 'Services',
                    'bn' => 'Services',
                ],
                'id' => 'service',
                'dropdown' => [],
                'url' => url('service'),
            ],
            [
                'title' => [
                    'en' => 'Portfolio',
                    'bn' => 'Portfolio',
                ],
                'id' => 'portfolio',
                'dropdown' => $this->getPortfolioDropdown(),
                'url' => url('portfolio'),
            ],
            [
                'title' => [
                    'en' => 'Contact',
                    'bn' => 'Contact',
                ],
                'id' => 'contact',
                'dropdown' => [],
                'url' => url('contact'),
            ]
            // [
            //     'title' => [
            //         'en' => 'Photo Gallery',
            //         'bn' => 'Photo Gallery',
            //     ],
            //     'id' => 'photo_gallery',
            //     'dropdown' => [],
            //     'url' => route('site.item.post.index', ['category_slug' => 'photo-gallery']),
            // ],
            // [
            //     'title' => [
            //         'en' => 'Video Gallery',
            //         'bn' => 'ভিডিও গ্যলারী',
            //     ],
            //     'id' => 'video_gallery',
            //     'dropdown' => [],
            //     'url' => route('site.item.post.index', ['category_slug' => 'video-gallery']),
            // ],
            // [
            //     'title' => [
            //         'en' => 'Blog',
            //         'bn' => 'ব্লগ',
            //     ],
            //     'id' => 'blog',
            //     'dropdown' => [],
            //     'url' => route('site.blog.index'),
            // ],
            // [
            //     'title' => [
            //         'en' => 'পিকেসিএসবিডি কী',
            //         'bn' => 'পিকেসিএসবিডি কী',
            //     ],
            //     'id' => 'blog',
            //     'dropdown' => $this->getContentDropdown('পিকেসিএসবিডি-কী'),
            //     'url' => url('/'),
            // ],
            
            
        ];

        view()->share('site_nav', json_decode(json_encode($site_nav)));

        // manipulating top nav
        $top_nav = [
            // [
            //     'title' => [
            //         'en' => 'What is PKCSBD?',
            //         'bn' => 'পিকেসিএসবিডি কী?',
            //     ],
            //     'id' => 'content_1',
            //     'url' => route('site.content.post.index', ['category_slug' => 'পিকেসিএসবিডি-কী']),
            // ],
            // [
            //     'title' => [
            //         'en' => 'What is Talent Hunt?',
            //         'bn' => 'ট্যালেন্ট হান্ট কি?',
            //     ],
            //     'id' => 'content_2',
            //     'url' => route('site.content.post.index', ['category_slug' => 'ট্যালেন্ট-হান্ট-কি']),
            // ],
            // [
            //     'title' => [
            //         'en' => 'Why is Talent Hunt?',
            //         'bn' => 'কেন এই ট্যালেন্ট হান্ট?',
            //     ],
            //     'id' => 'content_3',
            //     'url' => route('site.content.post.index', ['category_slug' => 'কেন-এই-ট্যালেন্ট-হান্ট']),
            // ],
            // [
            //     'title' => [
            //         'en' => 'Process of Talent Hunt',
            //         'bn' => 'ট্যালেন্ট হান্ট পদ্ধতি',
            //     ],
            //     'id' => 'content_4',
            //     'url' => route('site.content.post.index', ['category_slug' => 'ট্যালেন্ট-হান্ট-পদ্ধতি']),
            // ],
            // [
            //     'title' => [
            //         'en' => 'Structure',
            //         'bn' => 'কাঠামো',
            //     ],
            //     'id' => 'content_5',
            //     'dropdown' => [],
            //     'url' => route('site.content.post.index', ['category_slug' => 'কাঠামো']),
            // ],
            // [
            //     'title' => [
            //         'en' => 'Schedule',
            //         'bn' => 'সময়সূচি',
            //     ],
            //     'id' => 'content_6',
            //     'url' => route('site.content.post.index', ['category_slug' => 'সময়সূচি']),
            // ],
            // [
            //     'title' => [
            //         'en' => 'Registration Process',
            //         'bn' => 'নিবন্ধন প্রক্রিয়া',
            //     ],
            //     'id' => 'content_7',
            //     'url' => route('site.content.post.index', ['category_slug' => 'নিবন্ধন-প্রক্রিয়া']),
            // ],
            // [
            //     'title' => [
            //         'en' => 'Participation',
            //         'bn' => 'দর্শক অংশগ্রহণ',
            //     ],
            //     'id' => 'content_8',
            //     'url' => route('site.content.post.index', ['category_slug' => 'দর্শক-অংশগ্রহণ']),
            // ]
        ];

        view()->share('top_nav', json_decode(json_encode($top_nav)));
    }

    public function getContentDropdown($content_slug)
    {
        // about us dropdown
        $content_category = ContentCategory::where('slug', $content_slug)->first();
        $content_posts = ContentPost::where('status', 1)->where('content_category_id',$content_category->id )->orderBy('order', 'asc')->get();
        $content_dropdown = [];

        foreach ($content_posts as $content_post)
        {
            $data = [
                'title' => $content_post->title,
                'id' => snake_case($content_post->title),
                'url' => route('site.content.post.show', ['category_slug' => $content_slug, 'post_slug' => $content_post->slug])
            ];

            array_push($content_dropdown, $data);
        }

        return $content_dropdown;
    }

    public function getPortfolioDropdown()
    {
        $categories = PortfolioCategory::where('status', 1)->get();

        $portfolio_dropdown = [];

        foreach ($categories as $category)
        {
            $data = [
                'title' => $category->title,
                'id' => snake_case($category->title),
                'url' => route('site.portfolio.index', ['category_id' => $category->id])
            ];

            array_push($portfolio_dropdown, $data);
        }

        return $portfolio_dropdown;
    }

    public function getProjectDropdown()
    {
        $categories = ProjectCategory::where('status', 1)->get();

        $project_dropdown = [];

        foreach ($categories as $category)
        {
            $data = [
                'title' => $category->title,
                'id' => snake_case($category->title),
                'url' => route('site.project.index', ['category_id' => $category->id])
            ];

            array_push($project_dropdown, $data);
        }

        return $project_dropdown;
    }

   
}
