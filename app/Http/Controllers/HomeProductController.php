<?php

namespace App\Http\Controllers;

use App\Models\categoryModel;
use App\Models\ProductCategoryMappingModel;
use Illuminate\Http\Request;

class HomeProductController extends Controller
{

    public function singleCategoryProduct(string $id){

            $sCat = categoryModel::find($id);
            $sGetAllProductMappedData = ProductCategoryMappingModel::leftJoin('all_products', 'product_id', '=', 'all_products.id')
            ->leftJoin('categories', 'category_id', '=', 'categories.id')
            ->select('all_products.product_name' , 'all_products.description'  , 'categories.*')
            ->select( 'all_products.id as product_id' ,'all_products.local','all_products.product_name' ,'all_products.product_description'  , 'all_products.product_price' , 'all_products.product_image_path'  , 'categories.*')
            ->where('categories.id',"=" ,$id)
            ->get();


            return view('productPageOnSelection' , ['data'=> $sGetAllProductMappedData , 'cat'=> $sCat ]) ;
    }

    public function HomeUserLogged(){
        return view('home') ;
    }
}