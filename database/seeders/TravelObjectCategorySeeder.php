<?php

namespace Database\Seeders;

use App\Models\TravelObjectCategory;
use Illuminate\Database\Seeder;

class TravelObjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TravelObjectCategory::create([
            'category' => 'Pesona Alam'
        ]);

        TravelObjectCategory::create([
            'category' => 'Wisata Alam'
        ]);

        TravelObjectCategory::create([
            'category' => 'Wisata Budaya'
        ]);

        TravelObjectCategory::create([
            'category' => 'Wisata Sejarah'
        ]);
    }
}
