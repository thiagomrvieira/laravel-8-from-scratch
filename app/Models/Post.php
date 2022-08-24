<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    #   Permit mass assignment
    protected $fillable = [
        'title', 'excerpt', 'body'
    ];

    protected $with = [
        'category', 'author'
    ];

    #   Everything is fillable except the values in the array
    // protected $guarded = [
    //     'id',
    // ];

    #   Doesn't permit mass assignment
    // protected $guarded = [];
    
    #   Used to set the model binding by a differente identifier
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query
                ->where('title',  'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%')
        );
    }
}
