<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockProductModel extends Model
{
    protected $table="product_stocks" ;
    protected $primaryKey ="id" ;
    protected $fillable  = ['product','stocks'] ;
    use HasFactory;
}