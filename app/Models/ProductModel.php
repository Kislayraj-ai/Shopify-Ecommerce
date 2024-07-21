<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductModel extends Model
{
    protected $table = "all_Products" ;
    protected $primaryKey =  "id" ;
    protected $fillable = ['product_name','product_description','product_price', 'product_category' , 'product_online_date' , 'product_image_path' ,'local'] ;


    use HasFactory;
    use SoftDeletes ;

    public function mappings(){
        $this->belongsTo(ProductCategoryMappingModel::class) ;
    }
}