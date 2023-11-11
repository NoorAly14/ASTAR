<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Partition extends Model
{
    use HasFactory;

    protected $fillable = [
        'partition_name',
        'category_id'
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function items()
    {

        return $this->hasMany(Item::class, 'partition_id', 'id');
    }
}
