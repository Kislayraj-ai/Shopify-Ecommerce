<?php

namespace App\Http\Controllers;

use App\Models\categoryModel;
use App\Models\ProductCategoryMappingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class categoryController extends Controller
{
    public function addCategories(){
        return view('CPH.addCategories') ;
    }

    public function createCategory(Request $req){
        $cat_data = $req->all();

        categoryModel::create($cat_data) ;

        return redirect()->route('cph_dashboard') ;
        
    }
    public function managecreateCategory(){
        $sGetAllCategory = categoryModel::withTrashed()->get() ;
        
        return view('CPH.ManageCategory' ,['categoryData' => $sGetAllCategory ] ) ;
        
    }
    
    public function getCategoryById(Request $req){
  
        $catId = $req->get('categoryId') ;
        $sGetAllCategory = categoryModel::find($catId);
        // return response()->json(['data' => $sGetAllCategory]) ;
        return $sGetAllCategory ;
        
    }

    public function updateCategoryById(Request $req){
        
        $categoryId = $req->input('categoryId');
        $updatedName = $req->input('updatedName');
         
        $model =  categoryModel::find($categoryId) ;
        $model->category_name = $updatedName ;
        $model->save();

        return  true ;
    }
    public function frezeCategorybyId(Request $req){
        $categoryId = $req->input('categoryId');

        $sGetCategory = categoryModel::find($categoryId) ;
        $sGetCategory->delete() ;

        return redirect()->route('category.manageCategory') ;
    }

    public function getAllCategoryListingForMapping(Request $req){
        $sCategory = categoryModel::all();
        if($req->input('flag') == 1){
       
            $sCategoryMapping = ProductCategoryMappingModel::pluck('category_id')->toArray();
            $sCategories = categoryModel::whereIn('categories.id', $sCategoryMapping)
                // ->leftJoin('prodiuct_mappings as b', 'b.category_id', '=', 'categories.id')
                // ->where('categories.deleted_at', null)
                ->get();
                // dd($sCategories);
                
            return $sCategories;
            
        
        }
        return $sCategory ;
  
      }

      public function getAllCategoryMappingOneImage(){
       // $sCategoryMapping = ProductCategoryMappingModel::pluck('')->where('category_id','=')->toArray();
       $sCategoryMapping = ProductCategoryMappingModel::pluck('category_id')->toArray();
       $sCategories  = categoryModel::whereIn('categories.id', $sCategoryMapping)
       ->leftJoin('prodiuct_mappings as b', 'b.category_id', '=', 'categories.id')
       ->leftJoin('all_products', 'all_products.id', '=', 'b.product_id')
       ->where('categories.deleted_at', null)
       ->select('categories.id', 'categories.category_name', DB::raw('MAX(all_products.id) as product_id'), DB::raw('MAX(all_products.product_image_path) as product_image')
       ,DB::raw('MAX(all_products.local) as is_local')
       )
       ->groupBy('categories.id', 'categories.category_name')
       ->get();
   
           return   $sCategories ;
      }


}