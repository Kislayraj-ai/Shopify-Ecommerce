<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartOrderConfirmationModel extends Model
{
    protected $table =  'cart_order_confirm_details' ;
    protected $primayrKey =  'id' ;
    protected $fillable =  ['invoice' ,'cart_order_id' ,'products', 'address','amount_paid','paid','gateway_payment_id','gateway_order_id','gateway_signature','added_by'] ;
    use HasFactory;
}