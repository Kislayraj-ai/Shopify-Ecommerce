<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartModel extends Model
{
    protected $table= "carts" ;
    protected $primaryKey = "card_id";
    protected $fillable = [ 'product' ,'category','quantity' , 'price','added_by'] ;

    use HasFactory;
    use SoftDeletes ;

    public function product(){
        $this->belongsTo(ProductModel::class) ;
    }

    public function category(){
        $this->belongsTo(categoryModel::class) ;
    }
}