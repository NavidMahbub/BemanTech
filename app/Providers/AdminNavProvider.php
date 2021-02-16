<?php

namespace App\Providers;

use App\Models\ItemCategory;
use App\Models\ContentCategory;
use Illuminate\Support\ServiceProvider;

class AdminNavProvider extends ServiceProvider
{
    public function boot()
    {
        $admin_nav = [
            [
                'title' => 'Dashboard',
                'icon' => 'fa fa-dashboard',
                'id' => 'dashboard',
                'dropdown' => [],
                'url' => route('admin.dashboard.index'),
                'role' => ['0', '1', '2', '3', '4'],
                'visible' => true
            ],
            [
                'title' => 'Slider',
                'icon' => 'fa fa-dashboard',
                'id' => 'slider',
                'dropdown' => [],
                'url' => route('admin.slider.index'),
                'role' => ['0'],
                'visible' => true
            ],
            [
                'title' => 'Client',
                'icon' => 'fa fa-dashboard',
                'id' => 'client',
                'dropdown' => [],
                'url' => route('admin.client.index'),
                'role' => ['0'],
                'visible' => true
            ],
            [
                'title' => 'Team',
                'icon' => 'fa fa-dashboard',
                'id' => 'team',
                'dropdown' => [],
                'url' => route('admin.team.index'),
                'role' => ['0'],
                'visible' => true
            ],
            [
                'title' => 'Content',
                'icon' => 'fa fa-dashboard',
                'id' => 'content',
                'dropdown' => $this->getContentDropdown(),
                'url' => '',
                'role' => ['0'],
                'visible' => true
            ],
            [
                'title' => 'Portfolio',
                'icon' => 'fa fa-dashboard',
                'id' => 'portfolio',
                'dropdown' => [
                    [
                        'title' => 'Category',
                        'id' => 'portfolio_category',
                        'url' => route('admin.portfolio.category.index'),
                        'role' => ['0'],
                        'visible' => true
                    ],
                    [
                        'title' => 'List',
                        'id' => 'portfolio_list',
                        'url' => route('admin.portfolio.post.index'),
                        'role' => ['0'],
                        'visible' => true
                    ]
                ],
                'url' => '',
                'role' => ['0'],
                'visible' => true
            ],
            [
                'title' => 'Project',
                'icon' => 'fa fa-dashboard',
                'id' => 'project',
                'dropdown' => [
                    [
                        'title' => 'Category',
                        'id' => 'project_category',
                        'url' => route('admin.project.category.index'),
                        'role' => ['0'],
                        'visible' => true
                    ],
                    [
                        'title' => 'List',
                        'id' => 'project_list',
                        'url' => route('admin.project.post.index'),
                        'role' => ['0'],
                        'visible' => true
                    ]
                ],
                'url' => '',
                'role' => ['0'],
                'visible' => true
            ],
            [
                'title' => 'Item',
                'icon' => 'fa fa-dashboard',
                'id' => 'item',
                'dropdown' => $this->getItemDropdown(),
                'url' => '',
                'role' => ['0'],
                'visible' => true
            ],
            [
                'title' => 'Profile',
                'icon' => 'fa fa-user',
                'id' => 'profile',
                'dropdown' => [],
                'url' => url('/admin/registered-profile'),
                'role' => ['1'],
                'visible' => true
            ],
            [
                'title' => 'Message',
                'icon' => 'fa fa-envelope',
                'id' => 'message',
                'dropdown' => [],
                'url' => '',
                'role' => ['1'],
                'visible' => true
            ],
            [
                'title' => 'Result',
                'icon' => 'fa fa-tasks',
                'id' => 'result',
                'dropdown' => [],
                'url' => '',
                'role' => ['1'],
                'visible' => true
            ],
            [
                'title' => 'Certificate',
                'icon' => 'fa fa-certificate',
                'id' => 'certificate',
                'dropdown' => [],
                'url' => '',
                'role' => ['1'],
                'visible' => true
            ],
            [
                'title' => 'Blog',
                'icon' => 'fa fa-dashboard',
                'id' => 'blog',
                'dropdown' => [
                    [
                        'title' => 'Category',
                        'id' => 'blog_category',
                        'url' => route('admin.blog.category.index'),
                        'role' => ['0'],
                        'visible' => true
                    ],
                    [
                        'title' => 'Post',
                        'id' => 'blog_post',
                        'url' => route('admin.blog.post.index'),
                        'role' => ['0', '1'],
                        'visible' => true
                    ]
                ],
                'url' => '',
                'role' => ['0', '1'],
                'visible' => true
            ],
            [
                'title' => 'Download',
                'icon' => 'fa fa-dashboard',
                'id' => 'download',
                'dropdown' => [],
                'url' => route('admin.download.index'),
                'role' => ['0'],
                'visible' => true
            ],
            [
                'title' => 'Gallery',
                'icon' => 'fa fa-dashboard',
                'id' => 'gallery',
                'dropdown' => [],
                'url' => route('admin.gallery.index'),
                'role' => ['0'],
                'visible' => true
            ],
            [
                'title' => 'Job',
                'icon' => 'fa fa-tasks',
                'id' => 'job',
                'dropdown' => [
                    [
                        'title' => 'Job List',
                        'id' => 'job_list',
                        'url' => route('admin.job.list.index'),
                        'role' => ['0'],
                        'visible' => true
                    ],
                    [
                        'title' => 'Job Post',
                        'id' => 'job_post',
                        'url' => route('admin.job.post.index'),
                        'role' => ['0'],
                        'visible' => true
                    ],
                    [
                        'title' => 'Job Application',
                        'id' => 'job_application',
                        'url' => route('admin.job.application.index'),
                        'role' => ['0'],
                        'visible' => true
                    ]
                ],
                'url' => '',
                'role' => ['0'],
                'visible' => true
            ],
            [
                'title' => 'Registrations',
                'icon' => 'fa fa-tasks',
                'id' => 'job',
                'dropdown' => [
                    [
                        'title' => 'Approved',
                        'id' => 'approved',
                        'url' => route('admin.registration.index', ['filter' => 1]),
                        'role' => ['0', '2', '3', '4'],
                        'visible' => true
                    ],
                    [
                        'title' => 'Unapproved',
                        'id' => 'unapproved',
                        'url' => route('admin.registration.index', ['filter' => 0]),
                        'role' => ['0', '2', '3', '4'],
                        'visible' => true
                    ]
                ],
                'url' => '',
                'role' => ['0', '2', '3', '4'],
                'visible' => false
            ],
            [
                'title' => 'Settings',
                'icon' => 'fa fa-user',
                'id' => 'settings',
                'dropdown' => [
                    [
                        'title' => 'Users',
                        'id' => 'user_settings',
                        'url' => route('admin.user.index'),
                        'role' => ['0'],
                        'visible' => true
                    ],
                    [
                        'title' => 'Site',
                        'id' => 'site_settings',
                        'url' => route('admin.setting.site.index'),
                        'role' => ['0'],
                        'visible' => true
                    ],
                    [
                        'title' => 'Contact',
                        'id' => 'contact_settings',
                        'url' => route('admin.setting.contact.index'),
                        'role' => ['0'],
                        'visible' => true
                    ],
                    [
                        'title' => 'Seo',
                        'id' => 'seo_settings',
                        'url' => route('admin.setting.seo.index'),
                        'role' => ['0'],
                        'visible' => true
                    ]
                ],
                'url' => '',
                'role' => ['0'],
                'visible' => true
            ],
            [
                'title' => 'System',
                'icon' => 'fa fa-dashboard',
                'id' => 'system',
                'dropdown' => [
                    [
                        'title' => 'Content',
                        'id' => 'system_content',
                        'url' => route('admin.content.category.index'),
                        'role' => ['0'],
                        'visible' => true
                    ],
                    [
                        'title' => 'Item',
                        'id' => 'system_item',
                        'url' => route('admin.item.category.index'),
                        'role' => ['0'],
                        'visible' => true
                    ]
                ],
                'url' => '',
                'role' => 'super_admin',
                'visible' => false
            ]
        ];

        view()->share('admin_nav', json_decode(json_encode($admin_nav)));
    }

    public function getContentDropdown()
    {
        // content categories
        $content_categories = ContentCategory::all();
        $content_dropdown = [];

        foreach ($content_categories as $content_category)
        {
            $data = [
                'title' => $content_category->title,
                'id' => snake_case($content_category->title),
                'url' => route('admin.content.category.post.index', ['id' => $content_category->id]),
                'role' => ['0']
            ];

            array_push($content_dropdown, $data);
        }

        return $content_dropdown;
    }

    public function getItemDropdown()
    {
        // item categories
        $item_categories = ItemCategory::all();
        $item_dropdown = [];

        foreach ($item_categories as $item_category)
        {
            $data = [
                'title' => $item_category->title,
                'id' => snake_case($item_category->title),
                'url' => route('admin.item.category.post.index', ['id' => $item_category->id]),
                'role' => ['0']
            ];

            array_push($item_dropdown, $data);
        }

        return $item_dropdown;
    }
}
