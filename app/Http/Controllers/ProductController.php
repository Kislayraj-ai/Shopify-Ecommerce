<?php

namespace App\Http\Controllers;

use App\Models\categoryModel;
use App\Models\ProductCategoryMappingModel;
use App\Models\ProductModel;
use App\Models\StockProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    
    public function openCreateProduct(){
        return view('CPH.createProdiuctsData');
    }

    public function addProductData(Request $req){
    
        $sprice = (int) $req->input('product_price') ;

        $sOnlineDate  =  $req->input('product_online_date')  ;
        $sOnlineDate  =  date('Y-m-d', strtotime($sOnlineDate));

        $req->merge(['product_price' => $sprice]);
        $req->merge(['product_online_date' => $sOnlineDate]);
        $req->merge(['local' => 1 ]);


        $sProductData = $req->all() ;
        
        //! add file image storage and mappping
        $sFile = $req->file('product_image_path');
        $sfilename = time() .".".$sFile->getClientOriginalExtension() ;
        $sFile->storeAs('public/images',$sfilename) ;

        $sProductData['product_image_path'] =  $sfilename ; 
      
        $product = ProductModel::create($sProductData);
      
        if($product->id)
            return $product->id;
        else
        return false;

    }

    
    public function manageProducts(){
        return view('CPH.manageAllProducts') ;
    }
    public function manageProductCategorymapping(){
        return view('CPH.manageProductCategorymapping') ;
    }

    //! get all proudct that not being mapped
    public function getAllProductsListingForMapping(){

      $sMappingTable = ProductCategoryMappingModel::pluck('product_id')->toArray();
      $sProducts  = ProductModel::whereNotIn('id', $sMappingTable)->get();
      return response()->json( ['products'=> $sProducts , 'mappingData' => $sMappingTable ] );

    }

    public function getAllProducts(){
        $sProducts  = ProductModel::all() ;
        return  $sProducts  ;
    }

    public function insertProductCategoryMapping(Request $req){
        $sData =  $req->all() ;
        $id = ProductCategoryMappingModel::create($sData) ;
        
        if($id){
            return true ;
        }
        return false ;
    }

    public function showSingleProductDetail(string $id){

        $sData = ProductModel::leftJoin('prodiuct_mappings', 'all_products.id', '=', 'prodiuct_mappings.product_id')
        ->leftJoin('carts', 'all_products.id', '=', 'carts.product')
        ->where('all_products.id', '=', $id)
        ->select('all_products.*', 'prodiuct_mappings.category_id', 'carts.*')
        ->get();    

        return view('showSingleProductDetails' ,['productData' =>  $sData ]) ;

    }


    //! open product quantity
    public function createProductStocks(){
        return view('CPH.createProductStocks') ;

    }
    
    //! add product quantity
    public function addProductQuantity(Request $req){
        $sData = $req->all() ;
        $sId = StockProductModel::create(   $sData) ;
        if($sId){
            return redirect()->route('product.create_product_stocks') ;
        }
    }

    public function viewProductList(){


    
        return view('CPH.viewProductList' ) ;
    }

    public function  getProductListData(){
        $sData = DB::table('all_products')
        ->leftJoin('product_stocks as b' , 'b.product' , 'all_products.id')
        ->select('all_products.*', 'b.*')
        ->get();

        return $sData ;
    }

    public function checkQuantity(Request $req){

        $sid = $req->input('product_id') ;

        $sGetproductQuant = DB::table('product_stocks as a')
        ->leftJoin('all_products as b','b.id','=','a.product') 
        ->where('a.product','=',  $sid )
        ->get();

        return   $sGetproductQuant ;

    }

}