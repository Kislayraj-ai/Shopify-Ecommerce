<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CphUserModel extends Model
{
    protected $table = 'cph_user_logins';
    protected $primaryKey = 'id';
    protected $fillable = ['fname','lname','username','password','type'];
    use HasFactory;
}