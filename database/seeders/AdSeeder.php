<?php

namespace Database\Seeders;

use App\Models\Ad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ad::create([
            'id'          => 1,
            'title'       => 'Default Ad',
            'description' => 'This is a default ad description.',
            'link'        => '#',
            'status'      => 1,
            'expire_at'   => now(),
            'ad_rule'     => 'any size',
            'is_primary'  => 1,
        ]);
        $ads=[
            [
                'id'          => 2,
                'title'       => 'Home Sidebar Ad-1',
                'description' => 'This is a sidebar ad description.',
                'link'        => '#',
                'status'      => 1,
                'expire_at'   => now()->addDays(30),
                'ad_rule'     => '300x250',
                'is_primary'  => 0,
            ],
            [
                'id'          => 3,
                'title'       => 'Home Sidebar Ad-2',
                'description' => 'This is a header ad description.',
                'link'        => '#',
                'status'      => 1,
                'expire_at'   => now()->addDays(60),
                'ad_rule'     => '728x90',
                'is_primary'  => 0,
            ],
            [
                'id'          => 4,
                'title'       => 'Post Page Top Ad',
                'description' => 'This is a sidebar ad description.',
                'link'        => '#',
                'status'      => 1,
                'expire_at'   => now()->addDays(90),
                'ad_rule'     => '300x250',
                'is_primary'  => 0,
            ],
            [
                'id'          => 5,
                'title'       => 'Post Page Sidebar Ad-1',
                'description' => 'This is a sidebar ad description.',
                'link'        => '#',
                'status'      => 1,
                'expire_at'   => now()->addDays(120),
                'ad_rule'     => '300x250',
                'is_primary'  => 0,
            ],
            [
                'id'          => 6,
                'title'       => 'Post Page Sidebar Ad-2',
                'description' => 'This is a sidebar ad description.',
                'link'        => '#',
                'status'      => 1,
                'expire_at'   => now()->addDays(150),
                'ad_rule'     => '300x250',
                'is_primary'  => 0,
            ],
            [
                'id'          => 7,
                'title'       => 'Post Bottom Ad',
                'description' => 'This is a sidebar ad description.',
                'link'        => '#',
                'status'      => 1,
                'expire_at'   => now()->addDays(180),
                'ad_rule'     => '300x250',
                'is_primary'  => 0,
            ],

        ];
        foreach($ads as $ad){
            Ad::create($ad);
        }
    }
}
