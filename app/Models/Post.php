<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    #   Permit mass assignment
    // protected $fillable = [
    //     'title', 'excerpt', 'body'
    // ];

    #   Everything is fillable except the values in the array
    // protected $guarded = [
    //     'id',
    // ];

    #   Doesn't permit mass assignment
    // protected $guarded = [];
}
