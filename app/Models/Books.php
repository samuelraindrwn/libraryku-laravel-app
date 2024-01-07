<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Books extends Model
{
    use HasFactory;
    protected $primaryKey = 'book_id';
    
    protected $keyType = 'string';
    
    public $incrementing = false;
    
    protected $fillable = ['book_id','book_title',
    'publisher',
    'username',
    'category_id',
    'release_date',
    'author',
    'page',
    'synopsis',
    'cover',
    'pdf'];
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'categoryName');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'collections', 'book_id', 'user_id');
    }
    public function collections()
    {
        return $this->belongsToMany(Collection::class);
    }


}