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
}
