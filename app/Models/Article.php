<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $primaryKey = 'article_id';

    protected $keyType = 'string';

    public $incrementing = false;
    
    protected $fillable = ['article_id','article_title',
            'publisher',
            'author',
            'release_date',
            'category_id',
            'abstract',
            'pdf'];
            
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}