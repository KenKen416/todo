<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Todo extends Model
{
    use HasFactory;
    protected $fillable =['content','category_id'];
    public function category(){
        return $this->belongsto(Category::class);
    }
    public function scopeCategorySearch($query, $category_id)
    {
        if (!empty($category_id)) {
            $query->where('category_id', $category_id);
        }
    }
    public function scopeKeywordSearch($query, $Keyword)
    {
        if (!empty($Keyword)) {
            $query->where('content', 'like', '%' . $Keyword . '%');
        }
    }
}
