<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;//  dòng này để tự động thêm điều kiện delete_at = null vào câu query nhé
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'parent_id','slug'];

    public function products()
    {
        return $this->hasMany(Product::class,'category_id','id');
    }
}
