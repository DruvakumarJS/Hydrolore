<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userdetails extends Model
{
    use HasFactory;
    
     protected $fillable=[
        'firstname',
        'lastname',
        'mobile',
        'email',
        'location',
        'address',
        'hub_id'];
}
