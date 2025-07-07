<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignIn extends Model
{
    use HasFactory;
    protected $table = 'signin';
    protected $primaryKey = 'signin_id';
    protected $fillable = ['name', 'email', 'password', 'contact_no', 'profile_picture'];
}
