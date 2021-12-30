<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Posts extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $fillable = ["title", "excerpt", "body", "slug", "category_id", "user_id"];
    protected $with = ['category', 'user'];


    const CREATED_AT = 'created_at';
    const UPDATED_AT = "updated_at";

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {

            return $query->where(function ($query) use ($search) {
                return  $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%');
            });
        });


        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when($filters['author'] ?? false, function ($query, $author) {
            return $query->whereHas('user', function ($query) use ($author) {
                $query->where('username', $author);
            });
        });
    }
}
