<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FAQ extends Model
{
    use HasFactory;

    public function category()

{
    return $this->belongsTo(Category::class);
}
protected $table = 'faqs'; 
protected $fillable = ['question', 'answer', 'category_id'];

}
