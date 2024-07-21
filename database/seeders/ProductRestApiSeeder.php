<?php

namespace Database\Seeders;

use App\Models\ProductModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProductRestApiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        if(ProductModel::count() > 0 ){

            $this->command->info('Product Data already seeded . Skipping... ') ;
            return  ;
        }

        $sReponse = Http::get('https://api.escuelajs.co/api/v1/products') ;
        
        if($sReponse->successful()){

            $sApiData = $sReponse->json();

            foreach ($sApiData as $value) {
                ProductModel::create([
                    'product_name' => $value['title'] ,
                    'product_description' => $value['description'] ,
                    'product_price'  => $value['price'],
                    'product_image_path'  => $value['images'][0]
                ]);
             
            }

            
        }

    
    }
}