<?php

namespace Database\Seeders;

use App\Models\categoryModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class categorySeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(categoryModel::count() > 0){
            $this->command->info('Categpry Data already seeded . Skipping...');
            return;
        }
        
        $sCategoryData =   Http::get('https://api.escuelajs.co/api/v1/categories') ;
        if($sCategoryData->successful()){
            $sApiData = $sCategoryData->json() ;
            // Insert data into the database
            foreach ($sApiData as $item) {
                categoryModel::create(['category_name' => $item['name']]);
            }
            $this->command->info('Data seeded successfully.');
        }
    }
}