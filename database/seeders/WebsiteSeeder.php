<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Website;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Website::create([
            'name' => 'Amazon Shopping',
            'url' => 'https://www.amazon.in/',
            'is_active' => '1'            
        ]);

        Website::create([
            'name' => 'Flipkart',
            'url' => 'https://www.flipkart.com/',
            'is_active' => '1'            
        ]);

        Website::create([
            'name' => 'Myntra',
            'url' => 'https://www.myntra.com/',
            'is_active' => '1'            
        ]);

        Website::create([
            'name' => 'Snapdeal',
            'url' => 'https://www.snapdeal.com/',
            'is_active' => '1'            
        ]);
    }
}
