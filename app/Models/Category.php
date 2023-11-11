<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Partition;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name'
    ];

    public function partitions()
    {
        return $this->hasMany(Partition::class, 'category_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'category_id', 'id');
    }
}
