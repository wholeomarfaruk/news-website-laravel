<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySedder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        $categories = [

            'মোটামুটি',
            'খেলা',
            'বিনোদন',
            'সারাদেশ',
            'আন্তর্জাতিক',
            'জাতীয়',
            'বাণিজ্য',
            'রাজনীতি',
            'শিক্ষা',
            'হট নিউজ',
            'অপরাধ'
        ];


        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name'      => $category,
                'slug'      => Str::slug($category, '-'),
                'parent_id' => null,
                'created_at'=> now(),
                'updated_at'=> now(),
            ]);
        }
    }
}
