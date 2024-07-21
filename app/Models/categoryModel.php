<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class categoryModel extends Model
{

    protected $table = "categories" ;
    protected $primaryKey = "id" ;
    protected $fillable = ['category_name'] ;
    
    use HasFactory;
    use SoftDeletes;

    public function product(){
        $this->belongsToMany(ProductModel::class) ;
    }
}