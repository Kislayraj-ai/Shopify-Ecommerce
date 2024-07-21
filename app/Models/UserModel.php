<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserModel extends Model
{
    protected $table = 'user_detail' ;
    protected $primaryKey = 'id' ;
    protected $fillable = ['user_name' ,'user_password'  ] ;
    use HasFactory;
    use SoftDeletes ;
}