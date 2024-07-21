<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetailsModel extends Model
{
    protected $table =  'order_details' ;
    protected $primarykey =  'order_id' ;
    protected $fillable =  ['order_no' , 'card_id' ,'added_by','completed' ] ;
    
    use SoftDeletes ;
    use HasFactory;

    public function cart(){

        $this->belongsTo(CartModel::class ,'card_id') ;
    }
}