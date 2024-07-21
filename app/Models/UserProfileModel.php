<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfileModel extends Model
{
    protected $table =  'user_profiles' ;
    protected $primaryKey =  'user_id' ;
    protected $fillable =  ['fname', 'lname' ,'email' ,'phoneno' , 'area','city','state','zip_code' ,'dob'] ;
    

    use HasFactory;
}