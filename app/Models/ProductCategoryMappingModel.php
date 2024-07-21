<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategoryMappingModel extends Model
{
   protected $table = "prodiuct_mappings" ;
   protected $primayKey = "id" ;
   protected $fillable = ['product_id','category_id'];


    use HasFactory;

    public function product() {
        return $this->belongsTo(ProductModel::class , 'product_id');
    }

    public function category() {
        return $this->belongsTo(categoryModel::class , 'category_id');
    }

}