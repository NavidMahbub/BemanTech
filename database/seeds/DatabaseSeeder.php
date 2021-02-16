<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // user seeder
        \App\User::create([
            'name' => 'Admin',
            'email' => 'admin@pkcsbd.com',
            'email_verified_at' => now(),
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(10),
            'approved' => 1,
            'type' => 0,
        ]);
        \App\User::create([
            'name' => 'Accountant',
            'email' => 'accountant@pkcsbd.com',
            'email_verified_at' => now(),
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(10),
            'approved' => 1,
            'type' => 2,
        ]);
        \App\User::create([
            'name' => 'Field Admin',
            'email' => 'fieldadmin@pkcsbd.com',
            'email_verified_at' => now(),
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(10),
            'approved' => 1,
            'type' => 3
        ]);
        \App\User::create([
            'name' => 'Data Entry',
            'email' => 'dataentry@pkcsbd.com',
            'email_verified_at' => now(),
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(10),
            'approved' => 1,
            'type' => 4
        ]);
        $this->command->info('Users seeded successfully.');

        // slider seeder
        /*factory(\App\Models\Slider::class, 5)->create();
        $this->command->info('Sliders seeded successfully.');

        // client seeder
        factory(\App\Models\Client::class, 10)->create();
        $this->command->info('Team seeded successfully.');

        // team seeder
        factory(\App\Models\Team::class, 10)->create();
        $this->command->info('Clients seeded successfully.');

        // download seeder
        factory(\App\Models\Download::class, 10)->create();
        $this->command->info('Downloads seeded successfully.');

        // jobs seeder
        factory(\App\Models\Job::class, 10)->create();
        $this->command->info('Jobs seeded successfully.');

        // gallery seeder
        factory(\App\Models\Gallery::class, 10)->create();
        $this->command->info('Galleries seeded successfully.');

        // portfolio category seeder
        factory(\App\Models\PortfolioCategory::class, 10)->create();
        $this->command->info('Portfolio categories seeded successfully.');

        // portfolio post seeder
        factory(\App\Models\PortfolioPost::class, 10)->create();
        $this->command->info('Portfolio posts seeded successfully.');

        // project category seeder
        factory(\App\Models\ProjectCategory::class, 4)->create();
        $this->command->info('Project categories seeded successfully.');

        // project post seeder
        factory(\App\Models\ProjectPost::class, 20)->create();
        $this->command->info('Project posts seeded successfully.');

        // blog category seeder
        factory(\App\Models\BlogCategory::class, 10)->create();
        $this->command->info('Blog category seeded successfully.');

        // blog post seeder
        factory(\App\Models\BlogPost::class, 10)->create();
        $this->command->info('Blog post seeded successfully.');*/

        // setting seeder
        factory(\App\Models\SettingContact::class, 1)->create();
        factory(\App\Models\SettingSite::class, 1)->create();
        factory(\App\Models\SettingSeo::class, 1)->create();
        $this->command->info('Settings seeded successfully.');

        // seed content data
        $this->call(ContentSeeder::class);

        // seed item data
        $this->call(ItemSeeder::class);

        // bkash setting
        \App\Models\BkashSetting::create([
            'app_id' => env('BKASH_APP_ID'),
            'app_secret' => env('BKASH_APP_SECRET'),
            'username' => env('BKASH_USERNAME'),
            'password' => env('BKASH_PASSWORD')
        ]);
    }
}
