<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersDetailsModel extends Model
{
    protected $table =  'user_detail' ;
    protected $primarykey =  'id' ;
    protected $fillable =  ['user_id' , 'user_name' ,'user_password' , 'freeze'] ;


    use HasFactory;
    
}